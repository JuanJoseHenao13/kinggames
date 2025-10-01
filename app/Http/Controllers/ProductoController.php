<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all(); // Fetch all providers
        $query = Producto::with(['categoria', 'proveedor']); // Eager load proveedor

        // Filter by category
        if ($request->filled('categoria')) {
            $query->where('id_categoria', $request->categoria);
        }

        // Filter by provider
        if ($request->filled('proveedor')) {
            $query->where('id_proveedor', $request->proveedor);
        }

        // Search by product name
        if ($request->filled('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        $productos = $query->paginate(9);

        if ($request->ajax()) {
            $view = 'productos.partials.lista';
            if (auth()->check() && auth()->user()->rol === 'admin') {
                $view = 'admin.productos.partials.lista';
            }
            return view($view, compact('productos'))->render();
        }

        // Check if user is admin and show admin view
        if (auth()->check() && auth()->user()->rol === 'admin') {
            return view('admin.productos.index', compact('productos', 'categorias', 'proveedores'));
        }

        if (auth()->check() && auth()->user()->rol === 'cliente' && $request->route()->getPrefix() == '/cliente') {
            return view('cliente.productos.index', compact('productos', 'categorias', 'proveedores'));
        }

        return view('productos.index', compact('productos', 'categorias', 'proveedores'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('productos.create', compact('categorias', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_id' => 'nullable|string|max:255',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->id_categoria = $request->id_categoria;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->id_proveedor = $request->id_proveedor;

        // Procesar el video_id
        if ($request->video_id) {
            $videoId = $this->extractYouTubeVideoId($request->video_id);
            $producto->video_id = $videoId;
        }

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $imagePath;

            // Log para depurar
            \Log::info('Imagen guardada en: ' . $imagePath);
            \Log::info('Ruta completa del archivo: ' . storage_path('app/public/' . $imagePath));
            \Log::info('Archivo existe: ' . (file_exists(storage_path('app/public/' . $imagePath)) ? 'Sí' : 'No'));
        } else {
            \Log::warning('No se recibió archivo de imagen');
        }

        $producto->save();

        // Log del producto guardado
        \Log::info('Producto guardado con ID: ' . $producto->id_producto . ', imagen: ' . $producto->imagen . ', video_id: ' . $producto->video_id);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id_producto)
    {
        // Obtén el producto con el ID proporcionado
        $producto = Producto::with(['categoria', 'proveedor', 'inventario'])->findOrFail($id_producto);

        // Primero intenta obtener el video_id de la base de datos
        $videoId = $producto->video_id;

        // Si no hay video_id en la base de datos, usa el array de respaldo para productos existentes
        if (!$videoId) {
            $videos = [
                1 => 'twNmM6ntvMs',
                2  => 'vovkzbtYBC8',
                3  => 'kbbB-HMZ6_4',
                4  => 'InoAU5wUFcE',
                5  => 'oKSGpvf391s',
                6  => 'QdBZY2fkU-0',
                7  => 'cXSpEmPmbfc',
                8  => 'iN8pV8NdrvU',
                9  => '-58EAiGNveQ',
                10 => 'UAO2urG23S4',
                11 => '1RC1yxqTTd8',
                12 => '6YWlWzs1Prs',
                13 => ' ',
            ];
            $videoId = $videos[$producto->id_producto] ?? null;
        }

        // Verifica si el usuario es admin y usa la vista correspondiente
        if (auth()->check() && auth()->user()->rol === 'admin') {
            return view('admin.productos.show', compact('producto', 'videoId'));
        }

        // Pasa el producto y el ID del video a la vista
        return view('productos.show', compact('producto', 'videoId'));
    }

    public function showPublic($id_producto)
    {
        // Obtén el producto con el ID proporcionado (solo datos públicos)
        $producto = Producto::with(['categoria'])->findOrFail($id_producto);

        // Primero intenta obtener el video_id de la base de datos
        $videoId = $producto->video_id;

        // Si no hay video_id en la base de datos, usa el array de respaldo para productos existentes
        if (!$videoId) {
            $videos = [
                1 => 'twNmM6ntvMs',
                2  => 'vovkzbtYBC8',
                3  => 'kbbB-HMZ6_4',
                4  => 'InoAU5wUFcE',
                5  => 'oKSGpvf391s',
                6  => 'QdBZY2fkU-0',
                7  => 'cXSpEmPmbfc',
                8  => 'iN8pV8NdrvU',
                9  => '-58EAiGNveQ',
                10 => 'UAO2urG23S4',
                11 => '1RC1yxqTTd8',
                12 => '6YWlWzs1Prs',
                13 => ' ',
            ];
            $videoId = $videos[$producto->id_producto] ?? null;
        }

        // Pasa el producto y el ID del video a la vista pública
        return view('productos.show-public', compact('producto', 'videoId'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('productos.edit', compact('producto', 'categorias', 'proveedores'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_id' => 'nullable|string|max:255',
        ]);

        $producto->fill($request->except(['imagen', 'video_id']));

        // Procesar el video_id
        if ($request->video_id) {
            $videoId = $this->extractYouTubeVideoId($request->video_id);
            $producto->video_id = $videoId;
        }

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $imagePath;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        // Primero eliminar el inventario relacionado para evitar error de clave foránea
        if ($producto->inventario) {
            $producto->inventario->delete();
        }

        // También eliminar los detalles de transacciones relacionados
        $producto->detalleTransacciones()->delete();

        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

    /**
     * Extract YouTube video ID from URL or return the ID if already provided
     */
    private function extractYouTubeVideoId($input)
    {
        // If it's already just the video ID (no URL), return as is
        if (!str_contains($input, 'youtube.com') && !str_contains($input, 'youtu.be')) {
            return trim($input);
        }

        // Extract from youtube.com/watch?v=VIDEO_ID
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $input, $matches)) {
            return $matches[1];
        }

        // If no match found, return the original input
        return trim($input);
    }
}
