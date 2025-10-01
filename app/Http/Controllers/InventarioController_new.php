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
            $productos = Producto::where('id_proveedor', $proveedorId)->with('inventario')->get();
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

        return redirect()->back()->with('success', 'Inventario creado correctamente.');
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

        return redirect()->back()->with('success', 'Inventario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();

        return redirect()->back()->with('success', 'Inventario eliminado correctamente.');
    }
}
