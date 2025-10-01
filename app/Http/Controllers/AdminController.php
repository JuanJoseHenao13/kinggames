<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Transaccion;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsuarios = Usuario::count();
        $usuariosActivos = Usuario::where('rol', 'cliente')->count();

        $totalProductos = Producto::count();
        $productosDestacados = Producto::where('estado', 'activo')->count();

        $totalCategorias = Categoria::count();
        $categoriasActivas = Categoria::count();

        $totalProveedores = Proveedor::count();
        $proveedoresActivos = Proveedor::where('estado', 'activo')->count();

        $totalInventario = Inventario::sum('stock');
        $stockBajo = Inventario::whereRaw('stock <= stock_minimo')->count();

        $totalTransacciones = Transaccion::count();
        $ingresosMes = Transaccion::where('created_at', '>=', Carbon::now()->startOfMonth())->sum('total');

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'usuariosActivos',
            'totalProductos',
            'productosDestacados',
            'totalCategorias',
            'categoriasActivas',
            'totalProveedores',
            'proveedoresActivos',
            'totalInventario',
            'stockBajo',
            'totalTransacciones',
            'ingresosMes'
        ));
    }
}
