<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $query = Categoria::query();

        if ($request->ajax() && $request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nombre_categoria', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%");
            });

            $categorias = $query->paginate(8);
            $view = view('categorias.partials.categorias_table', compact('categorias'))->render();

            return response()->json(['view' => $view]);
        }

        $categorias = $query->paginate(8);
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {     
        $request->validate([
            'nombre_categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        Categoria::create($request->all());

        return redirect('home')->with('ok', 'ok');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}