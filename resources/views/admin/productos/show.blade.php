@extends('layouts.admin')

@section('page-title', 'Detalles del Producto')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Detalles del Producto</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Información completa del producto</p>
        </div>
        <a href="{{ route('productos.index') }}" class="group bg-gradient-to-r from-azul-rey to-blue-500 text-white font-bold py-3 px-6 rounded-2xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
            <span class="flex items-center space-x-2">
                <span class="text-xl">⬅️</span>
                <span>Volver a Productos</span>
            </span>
        </a>
    </div>

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Imagen del producto -->
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado">Imagen</h2>
                    <div class="w-full h-64 rounded-xl overflow-hidden shadow-lg ring-2 ring-azul-rey/20">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Detalles del producto -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-4">Información General</h2>
                        <div class="space-y-3">
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">ID del Producto:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->id_producto }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Nombre:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->nombre }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Descripción:</strong>
                                <p class="text-gray-900 dark:text-white mt-1">{{ $producto->descripcion ?: 'Sin descripción' }}</p>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Categoría:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Proveedor:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->proveedor->nombre ?? 'Sin proveedor' }}</span>
                            </div>
                            @if($producto->proveedor)
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Descripción Proveedor:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->proveedor->descripcion ?? 'Sin descripción' }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">NIT:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->proveedor->nit ?? 'Sin NIT' }}</span>
                            </div>
                            @endif
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Precio:</strong>
                                <span class="text-dorado font-bold text-xl">${{ number_format($producto->precio, 2) }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Estado:</strong>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $producto->estado == 'activo' ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg' }}">
                                    {{ $producto->estado }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Inventario si existe -->
                    @if($producto->inventario)
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-dorado mb-3">Información de Inventario</h3>
                        <div class="space-y-2">
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Stock:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->inventario->stock ?? 0 }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Stock Mínimo:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $producto->inventario->stock_minimo ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Mostrar video si existe --}}
    @if($videoId)
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
        <div class="p-8">
            <div class="flex items-center mb-6">
                <div class="flex-shrink-0 mr-4">
                    <div class="w-12 h-12 bg-azul-rey rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado">Video Trailer</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">Contenido multimedia del producto</p>
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
    </div>
    @endif
</div>
@endsection
