@extends('layouts.admin')

@section('page-title', 'Detalles del Proveedor')

@section('content')
<div class="space-y-8">
    <!-- Encabezado -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent flex items-center gap-3">
                <span class="text-5xl">🏢</span>
                Detalles del Proveedor
            </h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2 text-lg">Información completa del proveedor y sus productos</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('proveedores.edit', $proveedor) }}" 
               class="group bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold py-3 px-6 rounded-2xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95 shadow-lg">
                <span class="flex items-center space-x-2">
                    <span class="text-xl">✏️</span>
                    <span>Editar</span>
                </span>
            </a>
            <a href="{{ route('proveedores.index') }}" 
               class="group bg-gradient-to-r from-azul-rey to-blue-500 text-white font-bold py-3 px-6 rounded-2xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95 shadow-lg">
                <span class="flex items-center space-x-2">
                    <span class="text-xl">⬅️</span>
                    <span>Volver a Proveedores</span>
                </span>
            </a>
        </div>
    </div>

    <!-- Información del Proveedor -->
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-3xl shadow-2xl overflow-hidden border-2 border-azul-rey/20 dark:border-azul-rey/30">
        <div class="p-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Información General -->
                <div>
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-blue-300 dark:from-yellow-400 dark:to-yellow-200 bg-clip-text text-transparent mb-6 flex items-center gap-2">
                        <span>📋</span>
                        Información General
                    </h2>

                    <div class="space-y-4">
                        <!-- ID -->
                        <div class="group bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-900/20 dark:to-blue-800/10 rounded-xl p-5 border-2 border-blue-200/50 dark:border-blue-500/30 hover:border-blue-400 dark:hover:border-blue-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">#</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-blue-600 dark:text-blue-400">ID del Proveedor</p>
                            </div>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $proveedor->id_proveedor }}</p>
                        </div>

                        <!-- Nombre -->
                        <div class="group bg-gradient-to-br from-orange-50 to-orange-100/50 dark:from-orange-900/20 dark:to-orange-800/10 rounded-xl p-5 border-2 border-orange-200/50 dark:border-orange-500/30 hover:border-orange-400 dark:hover:border-orange-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">🏭</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-orange-600 dark:text-orange-400">Nombre</p>
                            </div>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $proveedor->nombre }}</p>
                        </div>

                        <!-- Descripción -->
                        <div class="group bg-gradient-to-br from-indigo-50 to-indigo-100/50 dark:from-indigo-900/20 dark:to-indigo-800/10 rounded-xl p-5 border-2 border-indigo-200/50 dark:border-indigo-500/30 hover:border-indigo-400 dark:hover:border-indigo-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">📄</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-indigo-600 dark:text-indigo-400">Descripción</p>
                            </div>
                            <p class="text-base text-gray-700 dark:text-gray-200 leading-relaxed">{{ $proveedor->descripcion ?: 'Sin descripción disponible' }}</p>
                        </div>

                        <!-- Estado -->
                        <div class="group bg-gradient-to-br from-gray-50 to-gray-100/50 dark:from-gray-900/20 dark:to-gray-800/10 rounded-xl p-5 border-2 border-gray-200/50 dark:border-gray-500/30 hover:border-gray-400 dark:hover:border-gray-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">⚡</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-gray-600 dark:text-gray-400">Estado</p>
                            </div>
                            <div>
                                <span class="px-5 py-2 inline-flex text-sm leading-5 font-bold rounded-full 
                                    {{ $proveedor->estado == 'activo' ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg shadow-green-500/50' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg shadow-red-500/50' }}">
                                    {{ ucfirst($proveedor->estado) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div>
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-green-500 to-green-300 dark:from-yellow-400 dark:to-yellow-200 bg-clip-text text-transparent mb-6 flex items-center gap-2">
                        <span>📞</span>
                        Información de Contacto
                    </h2>

                    <div class="space-y-4">
                        <!-- NIT -->
                        <div class="group bg-gradient-to-br from-purple-50 to-purple-100/50 dark:from-purple-900/20 dark:to-purple-800/10 rounded-xl p-5 border-2 border-purple-200/50 dark:border-purple-500/30 hover:border-purple-400 dark:hover:border-purple-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">🆔</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-purple-600 dark:text-purple-400">NIT</p>
                            </div>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $proveedor->nit ?: 'Sin NIT registrado' }}</p>
                        </div>

                        <!-- Dirección -->
                        <div class="group bg-gradient-to-br from-cyan-50 to-cyan-100/50 dark:from-cyan-900/20 dark:to-cyan-800/10 rounded-xl p-5 border-2 border-cyan-200/50 dark:border-cyan-500/30 hover:border-cyan-400 dark:hover:border-cyan-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">📍</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-cyan-600 dark:text-cyan-400">Dirección</p>
                            </div>
                            <p class="text-base text-gray-900 dark:text-white">{{ $proveedor->direccion ?: 'Sin dirección registrada' }}</p>
                        </div>

                        <!-- Teléfono -->
                        <div class="group bg-gradient-to-br from-green-50 to-green-100/50 dark:from-green-900/20 dark:to-green-800/10 rounded-xl p-5 border-2 border-green-200/50 dark:border-green-500/30 hover:border-green-400 dark:hover:border-green-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center space-x-3 mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-md flex-shrink-0">
                                    <span class="text-white font-bold text-lg">📱</span>
                                </div>
                                <p class="text-xs uppercase tracking-wider font-semibold text-green-600 dark:text-green-400">Teléfono</p>
                            </div>
                            <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $proveedor->telefono ?: 'Sin teléfono registrado' }}</p>
                        </div>

                        <!-- Card Decorativa Adicional -->
                        <div class="group bg-gradient-to-br from-yellow-50 to-yellow-100/50 dark:from-yellow-900/20 dark:to-yellow-800/10 rounded-xl p-5 border-2 border-yellow-200/50 dark:border-yellow-500/30 hover:border-yellow-400 dark:hover:border-yellow-400 transition-all duration-300 hover:shadow-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs uppercase tracking-wider font-semibold text-yellow-600 dark:text-yellow-400 mb-1">Productos Asociados</p>
                                    <p class="text-3xl font-extrabold text-gray-900 dark:text-white">{{ $proveedor->productos ? $proveedor->productos->count() : 0 }}</p>
                                </div>
                                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center shadow-md">
                                    <span class="text-3xl">📦</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Productos del Proveedor -->
    @if($proveedor->productos && $proveedor->productos->count() > 0)
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-3xl shadow-2xl overflow-hidden border-2 border-azul-rey/20 dark:border-azul-rey/30">
        <div class="px-8 py-6 border-b-2 border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 via-blue-500/5 to-transparent">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent flex items-center gap-2">
                        <span>🎮</span>
                        Productos del Proveedor
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $proveedor->productos->count() }} producto(s) disponible(s)</p>
                </div>
                <div class="flex items-center space-x-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-xl shadow-md">
                    <span class="text-lg">📊</span>
                    <span class="font-bold">Total: {{ $proveedor->productos->count() }}</span>
                </div>
            </div>
        </div>
        
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($proveedor->productos as $producto)
                <div class="group bg-white dark:bg-gris-oscuro rounded-2xl shadow-lg overflow-hidden border-2 border-gray-200/50 dark:border-gray-700/50 hover:shadow-2xl hover:border-blue-400 dark:hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-2">
                    <!-- Imagen del Producto -->
                    <div class="relative h-48 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" 
                             alt="{{ $producto->nombre }}" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        
                        <!-- Badge de Estado sobre la imagen -->
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1.5 inline-flex text-xs leading-5 font-bold rounded-full backdrop-blur-sm
                                {{ $producto->estado == 'activo' ? 'bg-green-500/90 text-white shadow-lg shadow-green-500/50' : 'bg-red-500/90 text-white shadow-lg shadow-red-500/50' }}">
                                {{ ucfirst($producto->estado) }}
                            </span>
                        </div>
                    </div>

                    <!-- Información del Producto -->
                    <div class="p-5 space-y-3">
                        <!-- Nombre -->
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white truncate group-hover:text-blue-600 dark:group-hover:text-yellow-400 transition-colors">
                            {{ $producto->nombre }}
                        </h3>

                        <!-- Precio -->
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-sm">💰</span>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Precio</p>
                                <p class="text-xl font-extrabold bg-gradient-to-r from-yellow-600 to-yellow-500 bg-clip-text text-transparent">
                                    ${{ number_format($producto->precio, 2) }}
                                </p>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div class="flex items-center justify-between bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-900/20 dark:to-blue-800/10 rounded-lg px-3 py-2 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="flex items-center space-x-2">
                                <span class="text-lg">📦</span>
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Stock:</span>
                            </div>
                            <span class="text-lg font-bold text-blue-600 dark:text-blue-400">
                                {{ $producto->inventario ? $producto->inventario->stock : 'N/A' }}
                            </span>
                        </div>

                        <!-- Botón Ver Producto -->
                        <a href="{{ route('productos.show', $producto) }}" 
                           class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white text-center font-bold py-2.5 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                            <span class="flex items-center justify-center space-x-2">
                                <span>👁️</span>
                                <span>Ver Detalles</span>
                            </span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <!-- Estado cuando no hay productos -->
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-3xl shadow-2xl overflow-hidden border-2 border-azul-rey/20 dark:border-azul-rey/30">
        <div class="p-16">
            <div class="flex flex-col items-center justify-center space-y-6">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                    <div class="relative w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-7xl">📦</span>
                    </div>
                </div>
                
                <div class="text-center space-y-3 max-w-md">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Sin productos asociados
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-lg">
                        Este proveedor aún no tiene productos registrados en el sistema.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection