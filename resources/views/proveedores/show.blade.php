@extends('layouts.admin')

@section('page-title', 'Detalles del Proveedor')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Detalles del Proveedor</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Información completa del proveedor</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('proveedores.edit', $proveedor) }}" class="group bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold py-3 px-6 rounded-2xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                <span class="flex items-center space-x-2">
                    <span class="text-xl">✏️</span>
                    <span>Editar</span>
                </span>
            </a>
            <a href="{{ route('proveedores.index') }}" class="group bg-gradient-to-r from-azul-rey to-blue-500 text-white font-bold py-3 px-6 rounded-2xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                <span class="flex items-center space-x-2">
                    <span class="text-xl">⬅️</span>
                    <span>Volver a Proveedores</span>
                </span>
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Información General -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-4">Información General</h2>
                        <div class="space-y-3">
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">ID del Proveedor:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $proveedor->id_proveedor }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Nombre:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $proveedor->nombre }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Descripción:</strong>
                                <p class="text-gray-900 dark:text-white mt-1">{{ $proveedor->descripcion ?: 'Sin descripción' }}</p>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Estado:</strong>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $proveedor->estado == 'activo' ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg' }}">
                                    {{ $proveedor->estado }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-4">Información de Contacto</h2>
                        <div class="space-y-3">
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">NIT:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $proveedor->nit ?: 'Sin NIT' }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Dirección:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $proveedor->direccion ?: 'Sin dirección' }}</span>
                            </div>
                            <div>
                                <strong class="text-gray-700 dark:text-gray-300">Teléfono:</strong>
                                <span class="text-gray-900 dark:text-white">{{ $proveedor->telefono ?: 'Sin teléfono' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Productos del Proveedor -->
    @if($proveedor->productos && $proveedor->productos->count() > 0)
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
        <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 to-transparent">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Productos del Proveedor</h2>
        </div>
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($proveedor->productos as $producto)
                <div class="bg-white dark:bg-gris-oscuro rounded-xl shadow-lg p-6 border-2 border-gray-200/50 dark:border-gray-700/50 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white truncate">{{ $producto->nombre }}</h3>
                            <p class="text-dorado font-semibold">${{ number_format($producto->precio, 2) }}</p>
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $producto->estado == 'activo' ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100' }}">
                                {{ $producto->estado }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
