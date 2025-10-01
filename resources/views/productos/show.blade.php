@extends('layouts.app')

@section('title', $producto->nombre . ' - Tienda de Videojuegos')

@section('content')

<div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-black dark:text-dorado">Detalles Producto</h1>
</div>

<div class="bg-blanco dark:bg-gris-oscuro rounded-lg shadow-lg overflow-hidden border-2 border-dorado">
    <div class="md:flex">
        <div class="md:flex-shrink-0">
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-48 w-full object-cover md:w-48">
        </div>
        <div class="p-8">
            <h1 class="text-3xl font-bold mb-2 text-rojo-oscuro dark:text-dorado">{{ $producto->nombre }}</h1>
            <p class="text-gray-700 dark:text-blanco mb-4">{{ $producto->descripcion }}</p>
            <strong class="text-gray-900 dark:text-dorado">Categoría:</strong>
            <span class="text-gray-700 dark:text-blanco">{{ $producto->categoria->nombre_categoria}}</span>
            <br>
            <p class="text-2xl font-bold text-dorado mb-4">${{ number_format($producto->precio, 2) }}</p>
            <p class="mb-4"><strong class="text-rojo-oscuro dark:text-dorado">Estado:</strong>
            <span class="text-gray-700 dark:text-blanco">{{ ucfirst($producto->estado) }}</span></p>
            <form action="{{ route('cart.add', $producto) }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-rojo-oscuro text-blanco font-bold py-2 px-4 rounded hover:bg-dorado hover:text-negro transition duration-300">Agregar al carrito</button>
            </form>
        </div>
    </div>
</div>

{{-- Mostrar video si existe --}}
@if($videoId)
<div class="mt-8 bg-blanco dark:bg-gris-oscuro rounded-lg shadow-lg p-6 border-2 border-dorado">
    <div class="flex items-center mb-6">
        <div class="flex-shrink-0 mr-4">
            <div class="w-12 h-12 bg-dorado rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-rojo-oscuro dark:text-dorado">Video Trailer</h2>
            <p class="text-gray-600 dark:text-gray-300 text-sm">Descubre más sobre este videojuego</p>
        </div>
    </div>

    <div class="relative w-full max-w-2xl mx-auto h-80 rounded-lg overflow-hidden shadow-2xl">
        <iframe
            src="https://www.youtube.com/embed/{{ $videoId }}"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            class="w-full h-full rounded-lg">
        </iframe>
    </div>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400">
            🎮 Video oficial del videojuego - {{ $producto->nombre }}
        </p>
    </div>
</div>
@endif

@endsection

@section('js')
@if(session('success'))
<script>
  Swal.fire({
    title: "Producto agregado",
    text: "Producto agregado exitosamente al carrito!",
    icon: "success"
  });
</script>
@endif
@endsection
