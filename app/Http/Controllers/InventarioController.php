<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index(Request $request)
    {
        $proveedores = Proveedor::all();

        $productos = collect();

        if ($request->has('proveedor_id')) {
            $proveedorId = $request->input('proveedor_id');
            $productosQuery = Producto::where('id_proveedor', $proveedorId)->with('inventario');

            if ($request->ajax() && $request->has('search')) {
                $search = $request->get('search');
                $productosQuery->where('nombre', 'like', '%' . $search . '%')
                    ->orWhere('descripcion', 'like', '%' . $search . '%')
                    ->orWhere('precio', 'like', '%' . $search . '%');
            }

            $productos = $productosQuery->get();

            if ($request->ajax()) {
                return view('admin.inventarios.partials.productos_table', compact('productos'))->render();
            }
        }

        return view('admin.inventarios.index', compact('proveedores', 'productos'));
    }

    public function create($productoId)
    {
        $producto = Producto::findOrFail($productoId);

        return view('admin.inventarios.create', compact('producto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);

        // Verificar si ya existe inventario para este producto
        $existingInventario = Inventario::where('id_producto', $request->id_producto)->first();

        if ($existingInventario) {
            return redirect()->back()->with('error', 'Ya existe un registro de inventario para este producto.');
        }

        Inventario::create([
            'id_producto' => $request->id_producto,
            'stock' => $request->stock,
            'stock_minimo' => $request->stock_minimo,
        ]);

        session(['last_proveedor_id' => $request->input('proveedor_id')]);
        return redirect()->route('inventarios.index', ['proveedor_id' => $request->input('proveedor_id')])->with('success', 'Inventario creado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $inventario = Inventario::findOrFail($id);

        $request->validate([
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);

        $inventario->stock = $request->input('stock');
        $inventario->stock_minimo = $request->input('stock_minimo');
        $inventario->save();

        return redirect()->route('inventarios.index', ['proveedor_id' => $inventario->producto->id_proveedor])->with('success', 'Inventario actualizado correctamente.');
    }

    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        $producto = $inventario->producto;

        return view('admin.inventarios.edit', compact('inventario', 'producto'));
    }

    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();

        return redirect()->back()->with('success', 'Inventario eliminado correctamente.');
    }
}
