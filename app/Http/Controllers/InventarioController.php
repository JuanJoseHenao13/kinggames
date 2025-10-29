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
        $allProductos = Producto::all(); // Para el buscador global y selector

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
        } elseif ($request->has('producto_id')) {
            // Si se selecciona un producto específico
            $productoId = $request->input('producto_id');
            $producto = Producto::with('inventario')->find($productoId);
            if ($producto) {
                $productos = collect([$producto]);
            }
        }

        return view('admin.inventarios.index', compact('proveedores', 'productos', 'allProductos'));
    }

    public function show($id)
    {
        return redirect()->route('inventarios.edit', $id);
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
            'cantidad_agregar' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);

        // Verificar si ya existe inventario para este producto
        $existingInventario = Inventario::where('id_producto', $request->id_producto)->first();

        if ($existingInventario) {
            // Si existe, sumar la cantidad al stock actual
            $existingInventario->stock += $request->cantidad_agregar;
            $existingInventario->stock_minimo = $request->stock_minimo; // Actualizar stock mínimo si es necesario
            $existingInventario->save();

            $message = 'Inventario actualizado correctamente. Stock aumentado en ' . $request->cantidad_agregar . ' unidades.';
        } else {
            // Si no existe, crear nuevo inventario con la cantidad como stock inicial
            Inventario::create([
                'id_producto' => $request->id_producto,
                'stock' => $request->cantidad_agregar,
                'stock_minimo' => $request->stock_minimo,
            ]);

            $message = 'Inventario creado correctamente con ' . $request->cantidad_agregar . ' unidades iniciales.';
        }

        session(['last_proveedor_id' => $request->input('proveedor_id')]);
        return redirect()->route('inventarios.index', ['proveedor_id' => $request->input('proveedor_id')])->with('success', $message);
    }

    public function update(Request $request, $id)
    {
        $inventario = Inventario::findOrFail($id);

        $request->validate([
            'cantidad_agregar' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
        ]);

        $inventario->stock += $request->input('cantidad_agregar');
        $inventario->stock_minimo = $request->input('stock_minimo');
        $inventario->save();

        return redirect()->route('inventarios.index', ['proveedor_id' => $inventario->producto->id_proveedor])->with('success', 'Inventario actualizado correctamente. Stock aumentado en ' . $request->input('cantidad_agregar') . ' unidades.');
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
