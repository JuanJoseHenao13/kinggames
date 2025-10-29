@extends('layouts.admin')

@section('page-title', 'Detalles del Producto')

@section('content')
<div class="space-y-10">
    <!-- Encabezado -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-yellow-400 dark:to-yellow-200 bg-clip-text text-transparent">
                🎮 Detalles del Producto
            </h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Información completa del producto</p>
        </div>
        <a href="{{ route('productos.index') }}" 
           class="group bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold py-3 px-6 rounded-2xl hover:from-blue-500 hover:to-blue-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
            <span class="flex items-center space-x-2">
                <span class="text-xl">⬅️</span>
                <span>Volver a Productos</span>
            </span>
        </a>
    </div>

    <!-- Contenedor principal -->
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-[#111827] dark:to-[#1e293b] rounded-2xl shadow-2xl overflow-hidden border border-blue-500/20">
        <div class="p-10">
            <!-- Grid principal: Imagen a la izquierda, información a la derecha -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Columna de Imagen (1/3 del ancho) -->
                <div class="lg:col-span-1">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-blue-300 dark:from-yellow-400 dark:to-yellow-200 bg-clip-text text-transparent mb-4">
                        🖼️ Imagen del Producto
                    </h2>
                    <div class="relative group sticky top-4">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                        <div class="relative w-full aspect-square rounded-xl overflow-hidden shadow-lg ring-2 ring-blue-500/20">
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                        </div>
                    </div>
                </div>

                <!-- Columna de Información (2/3 del ancho) -->
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-blue-300 dark:from-yellow-400 dark:to-yellow-200 bg-clip-text text-transparent mb-6">
                        📋 Información General
                    </h2>

                    <div class="space-y-4">
                        <!-- Fila 1: ID y Nombre -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- ID del Producto -->
                            <div class="group bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-900/20 dark:to-blue-800/10 rounded-xl p-5 border-2 border-blue-200/50 dark:border-blue-500/30 hover:border-blue-400 dark:hover:border-blue-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">#</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-blue-600 dark:text-blue-400">ID Producto</p>
                                </div>
                                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $producto->id_producto }}</p>
                            </div>

                            <!-- Nombre -->
                            <div class="group bg-gradient-to-br from-purple-50 to-purple-100/50 dark:from-purple-900/20 dark:to-purple-800/10 rounded-xl p-5 border-2 border-purple-200/50 dark:border-purple-500/30 hover:border-purple-400 dark:hover:border-purple-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">📝</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-purple-600 dark:text-purple-400">Nombre</p>
                                </div>
                                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $producto->nombre }}</p>
                            </div>
                        </div>

                        <!-- Fila 2: Descripción (ancho completo) -->
                        <div class="group bg-gradient-to-br from-indigo-50 to-indigo-100/50 dark:from-indigo-900/20 dark:to-indigo-800/10 rounded-xl p-5 border-2 border-indigo-200/50 dark:border-indigo-500/30 hover:border-indigo-400 dark:hover:border-indigo-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">📄</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-indigo-600 dark:text-indigo-400">Descripción</p>
                            </div>
                            <p class="text-base text-gray-700 dark:text-gray-200 leading-relaxed">{{ $producto->descripcion ?: 'Sin descripción disponible' }}</p>
                        </div>

                        <!-- Fila 3: Categoría y Proveedor -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Categoría -->
                            <div class="group bg-gradient-to-br from-green-50 to-green-100/50 dark:from-green-900/20 dark:to-green-800/10 rounded-xl p-5 border-2 border-green-200/50 dark:border-green-500/30 hover:border-green-400 dark:hover:border-green-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">🏷️</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-green-600 dark:text-green-400">Categoría</p>
                                </div>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}</p>
                            </div>

                            <!-- Proveedor -->
                            <div class="group bg-gradient-to-br from-orange-50 to-orange-100/50 dark:from-orange-900/20 dark:to-orange-800/10 rounded-xl p-5 border-2 border-orange-200/50 dark:border-orange-500/30 hover:border-orange-400 dark:hover:border-orange-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">🏢</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-orange-600 dark:text-orange-400">Proveedor</p>
                                </div>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $producto->proveedor->nombre ?? 'Sin proveedor' }}</p>
                            </div>
                        </div>

                        <!-- Fila 4: Información del Proveedor (si existe) -->
                        @if($producto->proveedor)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Descripción del Proveedor -->
                            <div class="group bg-gradient-to-br from-cyan-50 to-cyan-100/50 dark:from-cyan-900/20 dark:to-cyan-800/10 rounded-xl p-5 border-2 border-cyan-200/50 dark:border-cyan-500/30 hover:border-cyan-400 dark:hover:border-cyan-400 transition-all duration-300 hover:shadow-lg">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">ℹ️</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-cyan-600 dark:text-cyan-400">Descripción Proveedor</p>
                                </div>
                                <p class="text-sm text-gray-700 dark:text-gray-200">{{ $producto->proveedor->descripcion ?? 'Sin descripción' }}</p>
                            </div>

                            <!-- NIT -->
                            <div class="group bg-gradient-to-br from-pink-50 to-pink-100/50 dark:from-pink-900/20 dark:to-pink-800/10 rounded-xl p-5 border-2 border-pink-200/50 dark:border-pink-500/30 hover:border-pink-400 dark:hover:border-pink-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">🆔</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-pink-600 dark:text-pink-400">NIT</p>
                                </div>
                                <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $producto->proveedor->nit ?? 'Sin NIT' }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Fila 5: Precio y Estado -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Precio -->
                            <div class="group bg-gradient-to-br from-yellow-50 to-yellow-100/50 dark:from-yellow-900/20 dark:to-yellow-800/10 rounded-xl p-5 border-2 border-yellow-200/50 dark:border-yellow-500/30 hover:border-yellow-400 dark:hover:border-yellow-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-yellow-300/20 rounded-full -mr-10 -mt-10"></div>
                                <div class="flex items-center space-x-3 mb-2 relative z-10">
                                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">💰</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-yellow-600 dark:text-yellow-400">Precio</p>
                                </div>
                                <p class="text-3xl font-extrabold bg-gradient-to-r from-yellow-600 to-yellow-500 bg-clip-text text-transparent relative z-10">${{ number_format($producto->precio, 2) }}</p>
                            </div>

                            <!-- Estado -->
                            <div class="group bg-gradient-to-br from-gray-50 to-gray-100/50 dark:from-gray-900/20 dark:to-gray-800/10 rounded-xl p-5 border-2 border-gray-200/50 dark:border-gray-500/30 hover:border-gray-400 dark:hover:border-gray-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                        <span class="text-white font-bold text-lg">⚡</span>
                                    </div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-gray-600 dark:text-gray-400">Estado</p>
                                </div>
                                <div>
                                    <span class="px-5 py-2 inline-flex text-sm leading-5 font-bold rounded-full 
                                        {{ $producto->estado == 'activo' ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg shadow-green-500/50' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg shadow-red-500/50' }}">
                                        {{ ucfirst($producto->estado) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Inventario -->
                        @if($producto->inventario)
                        <div class="mt-6">
                            <h3 class="text-xl font-bold bg-gradient-to-r from-blue-500 to-blue-300 dark:from-yellow-400 dark:to-yellow-200 bg-clip-text text-transparent mb-4 flex items-center space-x-2">
                                <span>🧩</span>
                                <span>Información de Inventario</span>
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                <!-- Stock -->
                                <div class="group bg-gradient-to-br from-teal-50 to-teal-100/50 dark:from-teal-900/20 dark:to-teal-800/10 rounded-xl p-5 border-2 border-teal-200/50 dark:border-teal-500/30 hover:border-teal-400 dark:hover:border-teal-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                    <div class="flex items-center space-x-3 mb-2">
                                        <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                            <span class="text-white font-bold text-lg">📦</span>
                                        </div>
                                        <p class="text-xs uppercase tracking-wider font-semibold text-teal-600 dark:text-teal-400">Stock</p>
                                    </div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $producto->inventario->stock ?? 0 }}</p>
                                </div>

                                <!-- Stock Mínimo -->
                                <div class="group bg-gradient-to-br from-rose-50 to-rose-100/50 dark:from-rose-900/20 dark:to-rose-800/10 rounded-xl p-5 border-2 border-rose-200/50 dark:border-rose-500/30 hover:border-rose-400 dark:hover:border-rose-400 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                                    <div class="flex items-center space-x-3 mb-2">
                                        <div class="w-10 h-10 bg-gradient-to-br from-rose-500 to-rose-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                            <span class="text-white font-bold text-lg">⚠️</span>
                                        </div>
                                        <p class="text-xs uppercase tracking-wider font-semibold text-rose-600 dark:text-rose-400">Stock Mínimo</p>
                                    </div>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $producto->inventario->stock_minimo ?? 0 }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Video del producto --}}
    @if($videoId)
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-[#111827] dark:to-[#1e293b] rounded-2xl shadow-2xl overflow-hidden border border-blue-500/20">
        <div class="p-10">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-blue-300 dark:from-yellow-400 dark:to-yellow-200 bg-clip-text text-transparent">
                        Video Trailer
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Contenido multimedia del producto</p>
                </div>
            </div>

            <div class="relative w-full max-w-3xl mx-auto h-80 rounded-lg overflow-hidden shadow-2xl">
                <iframe
                    src="https://www.youtube.com/embed/{{ $videoId }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    class="w-full h-full rounded-lg">
                </iframe>
            </div>

            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-4">
                🎮 Video oficial del videojuego - {{ $producto->nombre }}
            </p>
        </div>
    </div>
    @endif
</div>
@endsection