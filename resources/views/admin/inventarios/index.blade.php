@extends('layouts.admin')

@section('page-title', 'Gestión de Inventario')

@section('content')
<div class="space-y-6 p-6">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-5xl font-extrabold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 dark:from-blue-400 dark:via-indigo-400 dark:to-purple-400 bg-clip-text text-transparent mb-2">
                Gestión de Inventario
            </h1>
            <p class="text-gray-600 dark:text-gray-400 text-lg">Administra las cantidades de productos por proveedor</p>
        </div>
    </div>

    <!-- Search Cards Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Buscador de Proveedores -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700 group">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Buscar Proveedor</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="relative">
                    <input 
                        type="text" 
                        id="search-proveedores" 
                        placeholder="Escribe el nombre del proveedor..." 
                        class="w-full px-5 py-4 pl-12 border-2 border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-300 text-base"
                        list="proveedores-datalist"
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <datalist id="proveedores-datalist">
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->nombre }}" data-id="{{ $proveedor->id_proveedor }}">
                        @endforeach
                    </datalist>
                </div>
                <button 
                    id="select-proveedor-btn" 
                    class="mt-5 w-full px-6 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold rounded-2xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl active:scale-[0.98] flex items-center justify-center space-x-3"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span>Seleccionar Proveedor</span>
                </button>
            </div>
        </div>

        <!-- Buscador de Productos -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700 group">
            <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-6">
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Buscar Producto</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="relative">
                    <input
                        type="text"
                        id="search-productos-global"
                        placeholder="Escribe el nombre del producto..."
                        class="w-full px-5 py-4 pl-12 pr-12 border-2 border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-300 text-base"
                        list="productos-datalist"
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <button
                        id="clear-search-btn"
                        class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 transform -translate-y-1/2 hover:text-gray-600 dark:hover:text-gray-200 transition-colors"
                        title="Limpiar búsqueda"
                    >
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <datalist id="productos-datalist">
                        @foreach($allProductos as $producto)
                            <option value="{{ $producto->nombre }}" data-id="{{ $producto->id_producto }}" data-proveedor-id="{{ $producto->id_proveedor }}" data-proveedor-nombre="{{ $producto->proveedor->nombre ?? '' }}" data-stock="{{ $producto->inventario->stock ?? 0 }}" data-inventario-id="{{ $producto->inventario->id_inventario ?? '' }}" data-stock-minimo="{{ $producto->inventario->stock_minimo ?? '' }}" data-imagen="{{ asset('storage/' . $producto->imagen) }}">
                        @endforeach
                    </datalist>
                </div>
                <button 
                    id="select-producto-btn" 
                    class="mt-5 w-full px-6 py-4 bg-gradient-to-r from-purple-500 to-pink-600 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-700 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl active:scale-[0.98] flex items-center justify-center space-x-3"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span>Seleccionar Producto</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Selector de Proveedor -->
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
            <div class="flex items-center space-x-3">
                <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white">Filtrar por Proveedor</h2>
            </div>
        </div>
        <div class="p-6">
            <form method="GET" action="{{ route('inventarios.index') }}" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <select 
                        name="proveedor_id" 
                        id="proveedor_id" 
                        class="w-full px-5 py-4 rounded-2xl border-2 border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all duration-300 text-base font-medium cursor-pointer"
                    >
                        <option value="" class="text-gray-500 bg-white dark:bg-gray-700 dark:text-gray-300">Selecciona un proveedor</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedor }}" class="text-gray-900 dark:text-white bg-white dark:bg-gray-700" {{ request('proveedor_id') == $proveedor->id_proveedor ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button 
                    type="submit" 
                    class="px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold rounded-2xl hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl active:scale-[0.98] flex items-center justify-center space-x-3 whitespace-nowrap"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span>Buscar Productos</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Div para mostrar información del proveedor seleccionado -->
    <div id="proveedor-info" class="hidden mt-4 p-5 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-2xl border-2 border-blue-200 dark:border-blue-700 text-blue-900 dark:text-blue-300 font-semibold text-lg shadow-md"></div>

    @if(request('proveedor_id'))
        <!-- Lista de Productos del Proveedor -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
            <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-900">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-blue-400 dark:to-purple-400 bg-clip-text text-transparent mb-4">
                    Productos de {{ $proveedores->where('id_proveedor', request('proveedor_id'))->first()->nombre ?? 'Proveedor' }}
                </h2>
                <div class="relative max-w-md">
                    <input 
                        type="text" 
                        id="search-productos" 
                        placeholder="Filtrar productos..." 
                        class="w-full px-5 py-3 pl-12 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-300"
                    >
                    <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900">
                        <tr>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Imagen</th>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Stock Actual</th>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Stock Mínimo</th>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-5 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="productos-table-body" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($productos as $producto)
                            <tr class="hover:bg-blue-50 dark:hover:bg-gray-700/50 transition-all duration-200 group">
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-sm font-bold text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-lg">
                                        #{{ $producto->id_producto }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <div class="w-20 h-20 rounded-2xl overflow-hidden shadow-lg ring-2 ring-gray-200 dark:ring-gray-600 group-hover:ring-blue-400 dark:group-hover:ring-blue-500 transition-all duration-300 transform group-hover:scale-110">
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $producto->nombre }}</span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    <span class="text-base font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/30 px-3 py-1 rounded-lg">
                                        ${{ number_format($producto->precio, 2) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if($producto->inventario)
                                        <span class="text-sm font-bold text-gray-900 dark:text-white bg-blue-100 dark:bg-blue-900/30 px-3 py-1 rounded-lg">
                                            {{ $producto->inventario->stock }} unidades
                                        </span>
                                    @else
                                        <span class="text-sm font-semibold text-red-600 dark:text-red-400">Sin inventario</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if($producto->inventario)
                                        <span class="text-sm font-bold text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-lg">
                                            {{ $producto->inventario->stock_minimo }} unidades
                                        </span>
                                    @else
                                        <span class="text-sm font-semibold text-red-600 dark:text-red-400">Sin inventario</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if($producto->inventario)
                                        <span class="px-4 py-2 inline-flex items-center text-xs leading-5 font-bold rounded-full {{ $producto->inventario->stock > $producto->inventario->stock_minimo ? 'bg-gradient-to-r from-green-400 to-emerald-500 text-white shadow-lg shadow-green-500/50' : 'bg-gradient-to-r from-red-400 to-rose-500 text-white shadow-lg shadow-red-500/50' }}">
                                            @if($producto->inventario->stock > $producto->inventario->stock_minimo)
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                                En Stock
                                            @else
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Bajo Stock
                                            @endif
                                        </span>
                                    @else
                                        <span class="px-4 py-2 inline-flex items-center text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-gray-400 to-gray-500 text-white shadow-lg">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                            </svg>
                                            Sin Inventario
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if($producto->inventario)
                                        <div class="flex space-x-2">
                                            <a href="{{ route('inventarios.edit', $producto->inventario->id_inventario) }}" class="group/btn relative bg-gradient-to-r from-blue-500 to-blue-600 text-white p-3 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-110 hover:shadow-lg active:scale-95 inline-flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover/btn:opacity-100 transition-opacity whitespace-nowrap">Editar</span>
                                            </a>
                                            <button onclick="deleteInventario({{ $producto->inventario->id_inventario }})" class="group/btn relative bg-gradient-to-r from-red-500 to-red-600 text-white p-3 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-110 hover:shadow-lg active:scale-95 inline-flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover/btn:opacity-100 transition-opacity whitespace-nowrap">Eliminar</span>
                                            </button>
                                        </div>
                                    @else
                                        <a href="{{ route('inventarios.create.with.product', $producto->id_producto) }}" class="group/btn relative bg-gradient-to-r from-green-500 to-emerald-600 text-white p-3 rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-300 transform hover:scale-110 hover:shadow-lg active:scale-95 inline-flex items-center justify-center">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover/btn:opacity-100 transition-opacity whitespace-nowrap">Crear Inventario</span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-full">
                                            <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No hay productos disponibles</h3>
                                            <p class="text-gray-500 dark:text-gray-400 text-lg">Selecciona otro proveedor o crea productos para este proveedor.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<!-- Modal para crear/editar inventario -->
<div id="inventarioModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm overflow-y-auto h-full w-full hidden z-50 flex items-center justify-center p-4">
    <div class="relative w-full max-w-md transform transition-all">
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-2xl font-bold text-white">Crear Inventario</h3>
                    <button onclick="closeInventarioModal()" class="text-white/80 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Modal Body -->
            <form id="inventarioForm" method="POST" class="p-6 space-y-5">
                @csrf
                <!-- Product Image -->
                <div class="flex justify-center mb-4">
                    <div class="w-32 h-32 rounded-2xl overflow-hidden shadow-lg ring-2 ring-gray-200 dark:ring-gray-600">
                        <img id="productoImagen" src="" alt="Imagen del producto" class="w-full h-full object-cover">
                    </div>
                </div>
                <!-- Supplier Info -->
                <div class="bg-blue-50 dark:bg-blue-900/30 p-4 rounded-xl border border-blue-200 dark:border-blue-700">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="text-sm font-semibold text-blue-900 dark:text-blue-300">Proveedor: <span id="modalProveedorNombre" class="font-bold"></span></span>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-3 flex items-center space-x-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span>Cantidad a Agregar</span>
                    </label>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2" id="currentStockDisplay" style="display: none;">Stock actual: <span id="currentStockValue"></span> unidades</p>
                    <input
                        type="number"
                        id="cantidad_agregar"
                        name="cantidad_agregar"
                        min="0"
                        class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-300 text-base"
                        placeholder="Ingresa la cantidad a agregar"
                        required
                    >
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-3 flex items-center space-x-2">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span>Stock Mínimo</span>
                    </label>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2" id="currentStockMinimoDisplay" style="display: none;">Stock mínimo actual: <span id="currentStockMinimoValue"></span> unidades</p>
                    <input
                        type="number"
                        id="stock_minimo"
                        name="stock_minimo"
                        min="0"
                        class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-500/20 focus:border-orange-500 dark:bg-gray-700 dark:text-white transition-all duration-300 text-base"
                        placeholder="Ingresa el stock mínimo"
                        required
                    >
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button 
                        type="button" 
                        onclick="closeInventarioModal()" 
                        class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300 font-semibold transform hover:scale-105 active:scale-95"
                    >
                        Cancelar
                    </button>
                    <button 
                        type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 font-bold transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl flex items-center space-x-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    
    function openCreateModal(productoId, productoNombre, imagen, supplierName) {
        document.getElementById('modalTitle').textContent = 'Crear Inventario - ' + productoNombre;
        document.getElementById('cantidad_agregar').value = '';
        document.getElementById('stock_minimo').value = '';
        document.getElementById('currentStockDisplay').style.display = 'none';
        document.getElementById('currentStockMinimoDisplay').style.display = 'none';
        document.getElementById('productoImagen').src = imagen;
        document.getElementById('modalProveedorNombre').textContent = supplierName;
        document.getElementById('inventarioForm').action = `/admin/inventarios/create/${productoId}`;
        document.getElementById('inventarioForm').method = 'POST';
        document.getElementById('inventarioModal').classList.remove('hidden');
    }

    function openEditModal(productoId, productoNombre, stock, stockMinimo, inventarioId, imagen, supplierName) {
        document.getElementById('modalTitle').textContent = 'Editar Inventario - ' + productoNombre;
        document.getElementById('cantidad_agregar').value = '';
        document.getElementById('stock_minimo').value = stockMinimo;
        document.getElementById('currentStockValue').textContent = stock;
        document.getElementById('currentStockMinimoValue').textContent = stockMinimo;
        document.getElementById('currentStockDisplay').style.display = 'block';
        document.getElementById('currentStockMinimoDisplay').style.display = 'block';
        document.getElementById('productoImagen').src = imagen;
        document.getElementById('modalProveedorNombre').textContent = supplierName;
        document.getElementById('inventarioForm').action = `/admin/inventarios/${inventarioId}`;
        document.getElementById('inventarioForm').method = 'POST';
        // Add method override for PUT
        let methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'PUT';
        document.getElementById('inventarioForm').appendChild(methodInput);
        document.getElementById('inventarioModal').classList.remove('hidden');
    }

    function closeInventarioModal() {
        document.getElementById('inventarioModal').classList.add('hidden');
        // Remove any method override inputs
        let methodInputs = document.querySelectorAll('input[name="_method"]');
        methodInputs.forEach(input => input.remove());
    }

    document.getElementById('search-productos')?.addEventListener('input', function() {
        const searchTerm = this.value;
        const tableBody = document.getElementById('productos-table-body');

        if (searchTerm.length > 0) {
            fetch(`{{ route('inventarios.index') }}?proveedor_id={{ request('proveedor_id') }}&search=${encodeURIComponent(searchTerm)}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                },
            })
            .then(response => response.text())
            .then(html => {
                tableBody.innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            // Reload the page to show all productos
            location.reload();
        }
    });

    document.getElementById('select-proveedor-btn')?.addEventListener('click', function() {
        const searchInput = document.getElementById('search-proveedores');
        const selectedValue = searchInput.value;
        const datalist = document.getElementById('proveedores-datalist');
        const options = datalist.querySelectorAll('option');

        let selectedId = null;
        options.forEach(option => {
            if (option.value === selectedValue) {
                selectedId = option.getAttribute('data-id');
            }
        });

        if (selectedId) {
            const select = document.getElementById('proveedor_id');
            select.value = selectedId;
            select.form.submit();
        } else {
            alert('Por favor selecciona un proveedor válido de la lista.');
        }
    });

    // Nuevo: Buscador en tiempo real para productos globales
    document.getElementById('search-productos-global')?.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const datalist = document.getElementById('productos-datalist');
        const options = datalist.querySelectorAll('option');

        // Limpiar opciones previas
        datalist.innerHTML = '';

        if (searchTerm.length > 0) {
            // Filtrar productos que coincidan con el término de búsqueda
            @json($allProductos).forEach(producto => {
                if (producto.nombre.toLowerCase().includes(searchTerm)) {
                    const option = document.createElement('option');
                    option.value = producto.nombre;
                    option.setAttribute('data-id', producto.id_producto);
                    option.setAttribute('data-proveedor-id', producto.id_proveedor);
                    option.setAttribute('data-proveedor-nombre', producto.proveedor?.nombre ?? '');
                    option.setAttribute('data-stock', producto.inventario?.stock ?? 0);
                    option.setAttribute('data-stock-minimo', producto.inventario?.stock_minimo ?? '');
                    option.setAttribute('data-inventario-id', producto.inventario?.id_inventario ?? '');
                    option.setAttribute('data-imagen', '/storage/' + producto.imagen);
                    datalist.appendChild(option);
                }
            });
        } else {
            // Si no hay término, mostrar todos los productos
            @json($allProductos).forEach(producto => {
                const option = document.createElement('option');
                option.value = producto.nombre;
                option.setAttribute('data-id', producto.id_producto);
                option.setAttribute('data-proveedor-id', producto.id_proveedor);
                option.setAttribute('data-proveedor-nombre', producto.proveedor?.nombre ?? '');
                option.setAttribute('data-stock', producto.inventario?.stock ?? 0);
                option.setAttribute('data-stock-minimo', producto.inventario?.stock_minimo ?? '');
                option.setAttribute('data-inventario-id', producto.inventario?.id_inventario ?? '');
                option.setAttribute('data-imagen', '/storage/' + producto.imagen);
                datalist.appendChild(option);
            });
        }
    });

    document.getElementById('select-producto-btn')?.addEventListener('click', function() {
        const searchInput = document.getElementById('search-productos-global');
        const selectedValue = searchInput.value;
        const datalist = document.getElementById('productos-datalist');
        const options = datalist.querySelectorAll('option');

        let selectedId = null;
        let selectedProveedorId = null;
        let selectedProveedorNombre = null;
        let selectedStock = null;
        let selectedStockMinimo = null;
        let selectedInventarioId = null;
        let selectedImagen = null;
        options.forEach(option => {
            if (option.value === selectedValue) {
                selectedId = option.getAttribute('data-id');
                selectedProveedorId = option.getAttribute('data-proveedor-id');
                selectedProveedorNombre = option.getAttribute('data-proveedor-nombre');
                selectedStock = option.getAttribute('data-stock');
                selectedStockMinimo = option.getAttribute('data-stock-minimo');
                selectedInventarioId = option.getAttribute('data-inventario-id');
                selectedImagen = option.getAttribute('data-imagen');
            }
        });

        if (selectedId) {
            // Mostrar información del proveedor y stock debajo del buscador
            const proveedorInfoDiv = document.getElementById('proveedor-info');
            if (proveedorInfoDiv) {
                const stockInfo = selectedStock && selectedStock !== '0' ? ` | Stock actual: <strong class="text-green-700 dark:text-green-300">${selectedStock} unidades</strong>` : ' | <strong class="text-red-700 dark:text-red-300">Sin inventario</strong>';
                proveedorInfoDiv.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-lg">Proveedor: <strong class="text-blue-700 dark:text-blue-300">${selectedProveedorNombre}</strong>${stockInfo}</p>
                    </div>
                `;
                proveedorInfoDiv.classList.remove('hidden');
            }
            // Abrir modal para crear o editar inventario
            if (selectedInventarioId && selectedInventarioId !== '') {
                openEditModal(selectedId, selectedValue, selectedStock, selectedStockMinimo, selectedInventarioId, selectedImagen, selectedProveedorNombre);
            } else {
                openCreateModal(selectedId, selectedValue, selectedImagen, selectedProveedorNombre);
            }
        } else {
            alert('Por favor selecciona un producto válido de la lista.');
        }
    });

    // Limpiar búsqueda de productos globales
    document.getElementById('clear-search-btn')?.addEventListener('click', function() {
        const searchInput = document.getElementById('search-productos-global');
        searchInput.value = '';
        // Reset datalist to show all products
        const datalist = document.getElementById('productos-datalist');
        datalist.innerHTML = '';
        @json($allProductos).forEach(producto => {
            const option = document.createElement('option');
            option.value = producto.nombre;
            option.setAttribute('data-id', producto.id_producto);
            option.setAttribute('data-proveedor-id', producto.id_proveedor);
            option.setAttribute('data-proveedor-nombre', producto.proveedor?.nombre ?? '');
            option.setAttribute('data-stock', producto.inventario?.stock ?? 0);
            option.setAttribute('data-stock-minimo', producto.inventario?.stock_minimo ?? '');
            option.setAttribute('data-inventario-id', producto.inventario?.id_inventario ?? '');
            option.setAttribute('data-imagen', '/storage/' + producto.imagen);
            datalist.appendChild(option);
        });
        // Hide proveedor info
        document.getElementById('proveedor-info').classList.add('hidden');
        // Close modal if open
        closeInventarioModal();
    });

    // Close modal when clicking outside
    document.getElementById('inventarioModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeInventarioModal();
        }
    });

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#10b981',
            confirmButtonText: 'Aceptar',
            customClass: {
                popup: 'rounded-3xl',
                confirmButton: 'rounded-xl'
            }
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'Aceptar',
            customClass: {
                popup: 'rounded-3xl',
                confirmButton: 'rounded-xl'
            }
        });
    @endif

    function deleteInventario(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            customClass: {
                popup: 'rounded-3xl',
                confirmButton: 'rounded-xl',
                cancelButton: 'rounded-xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/inventarios/${id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
