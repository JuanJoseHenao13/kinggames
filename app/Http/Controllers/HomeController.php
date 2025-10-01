<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categorias = \App\Models\Categoria::all();
        $query = Producto::where('estado', 'activo')->with('categoria');

        if ($request->has('categoria') && $request->categoria != '') {
            $query->where('id_categoria', $request->categoria);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        $productos = $query->paginate(6);

        if ($request->ajax()) {
            return response()->json([
                'view' => view('partials.product_list', compact('productos'))->render(),
                'pagination' => (string) $productos->links()
            ]);
        }

        return view('home', [
            'productos' => $productos,
            'categorias' => $categorias,
        ]);
    }
}