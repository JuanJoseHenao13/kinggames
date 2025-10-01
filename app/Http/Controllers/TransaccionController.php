<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\Usuario;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\DetalleTransaccion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->check() && auth()->user()->rol === 'cliente') {
            $transacciones = Transaccion::where('id_usuario', auth()->id())
                ->with(['usuario', 'proveedor', 'detalleTransacciones.producto'])
                ->orderBy('created_at', 'desc')
                ->get();
            return view('cliente.transacciones.index', compact('transacciones'));
        }

        $transacciones = Transaccion::with(['usuario', 'proveedor', 'detalleTransacciones.producto'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('transacciones.index', compact('transacciones'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('transacciones.create', compact('usuarios', 'proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:venta,compra',
            'id_usuario' => 'required_if:tipo,venta|exists:usuarios,id_usuario',
            'id_proveedor' => 'required_if:tipo,compra|exists:proveedores,id_proveedor',
            'productos' => 'required|array',
            'productos.*.id_producto' => 'required|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $transaccion = new Transaccion();
            $transaccion->tipo = $request->tipo;
            $transaccion->id_usuario = $request->id_usuario;
            $transaccion->id_proveedor = $request->id_proveedor;
            $transaccion->total = 0;
            $transaccion->fecha_transaccion = Carbon::now();
            $transaccion->save();

            $total = 0;

            foreach ($request->productos as $producto) {
                $detalle = new DetalleTransaccion();
                $detalle->id_transaccion = $transaccion->id_transaccion;
                $detalle->id_producto = $producto['id_producto'];
                $detalle->cantidad = $producto['cantidad'];
                $detalle->precio_unitario = $producto['precio_unitario'];
                $detalle->save();

                $total += $detalle->cantidad * $detalle->precio_unitario;

                // Actualizar inventario
                $inventario = Producto::find($producto['id_producto'])->inventario;
                if ($transaccion->tipo == 'venta') $inventario->cantidad -= $producto['cantidad'];
                else
                    $inventario->cantidad += $producto['cantidad'];
                $inventario->save();
            }

            $transaccion->total = $total;
            $transaccion->save();

            DB::commit();

            return redirect()->route('transacciones.index')->with('success', 'Transacción creada exitosamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Error al crear la transacción: ' . $e->getMessage()]);
        }
    }

    public function show($transaccionId)
    {
        // Find the transaction manually
        $transaccion = Transaccion::with(['detalleTransacciones.producto', 'usuario', 'proveedor'])
            ->findOrFail($transaccionId);

        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        // If user is admin, show admin view
        if ($user->rol === 'admin') {
            return view('transacciones.show', compact('transaccion'));
        }

        // If user is cliente and owns the transaction, show cliente view
        if ($user->rol === 'cliente' && $transaccion->id_usuario == $user->id_usuario) {
            return view('cliente.transacciones.show', compact('transaccion'));
        }

        // If user is cliente but doesn't own the transaction, redirect to their history
        if ($user->rol === 'cliente') {
            return redirect()->route('cliente.transacciones.index')->with('error', 'No tienes permiso para ver esta transacción.');
        }

        // Default: unauthorized
        abort(403);
    }

    public function destroy(Transaccion $transaccion)
    {
        DB::beginTransaction();

        try {
            foreach ($transaccion->detalleTransacciones as $detalle) {
                $inventario = $detalle->producto->inventario;
                if ($transaccion->tipo == 'venta')
                    $inventario->cantidad += $detalle->cantidad;
                else
                    $inventario->cantidad -= $detalle->cantidad;
                $inventario->save();
            }

            $transaccion->delete();

            DB::commit();

            return redirect()->route('transacciones.index')->with('success', 'Transacción eliminada exitosamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Error al eliminar la transacción: ' . $e->getMessage()]);
        }
    }
}