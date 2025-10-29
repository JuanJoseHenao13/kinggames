@extends('layouts.admin')

@section('page-title', 'Detalle de Transacción')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent dark:from-blue-400 dark:via-purple-400 dark:to-pink-400">
                Transacción #{{ $transaccion->id_transaccion }}
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Información completa de la transacción
            </p>
        </div>
        <a href="{{ route('transacciones.index') }}"
           class="group relative inline-flex items-center gap-2 bg-gradient-to-r from-amber-600 to-yellow-600 hover:from-amber-700 hover:to-yellow-700 text-white font-semibold py-2.5 px-5 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-amber-500/50 active:scale-95 overflow-hidden">
            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            <svg class="w-5 h-5 relative z-10 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span class="relative z-10">Volver</span>
        </a>
    </div>

    <!-- Main Content Card -->
    <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-800 overflow-hidden">
        <!-- Decorative gradient overlay -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>
        
        <div class="p-6">
            <!-- <CHANGE> Grid layout optimizado: 1fr 2fr para mejor distribución del espacio -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- General Information -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="p-2 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Información General</h3>
                    </div>
                    
                    <!-- <CHANGE> Espaciado reducido y diseño más compacto -->
                    <dl class="space-y-3">
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">ID Transacción</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white font-mono">{{ $transaccion->id_transaccion }}</dd>
                        </div>
                        
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1.5">Tipo</dt>
                            <dd>
                                @if($transaccion->tipo == 'venta')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold text-xs shadow-lg shadow-green-500/30">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        Venta
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-600 text-white font-bold text-xs shadow-lg shadow-blue-500/30">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                        Compra
                                    </span>
                                @endif
                            </dd>
                        </div>
                        
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Fecha
                            </dt>
                            <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $transaccion->fecha_transaccion ? $transaccion->fecha_transaccion->format('d/m/Y H:i:s') : 'N/A' }}</dd>
                        </div>
                        
                        <!-- <CHANGE> Total con formato sin decimales: number_format($precio, 0, ',', '.') -->
                        <div class="group p-4 rounded-xl bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-amber-900/20 dark:to-yellow-900/20 border-2 border-amber-200 dark:border-amber-700 hover:shadow-lg hover:shadow-amber-500/20 transition-all duration-200">
                            <dt class="text-xs font-medium text-amber-700 dark:text-amber-400 uppercase tracking-wider mb-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Total
                            </dt>
                            <dd class="text-2xl font-black bg-gradient-to-r from-amber-600 to-yellow-600 bg-clip-text text-transparent dark:from-amber-400 dark:to-yellow-400">
                                ${{ number_format($transaccion->total ?? 0, 0, ',', '.') }}
                            </dd>
                        </div>
                    </dl>
                </div>

                <!-- Customer/Supplier Information -->
                @if($transaccion->tipo == 'venta' && $transaccion->usuario)
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="p-2 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Cliente</h3>
                    </div>
                    
                    <!-- <CHANGE> Grid de 2 columnas para información del cliente más compacta -->
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Nombre Completo
                            </dt>
                            <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $transaccion->usuario->nombre }} {{ $transaccion->usuario->apellidos }}</dd>
                        </div>
                        
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Email
                            </dt>
                            <dd class="text-sm font-medium text-blue-600 dark:text-blue-400 truncate">{{ $transaccion->usuario->email }}</dd>
                        </div>
                        
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Teléfono
                            </dt>
                            <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $transaccion->usuario->telefono }}</dd>
                        </div>
                        
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Dirección
                            </dt>
                            <dd class="text-sm font-medium text-gray-900 dark:text-white">{{ $transaccion->usuario->direccion }}</dd>
                        </div>
                    </dl>
                </div>
                @elseif($transaccion->tipo == 'compra' && $transaccion->proveedor)
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="p-2 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Proveedor</h3>
                    </div>
                    
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                Nombre
                            </dt>
                            <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $transaccion->proveedor->nombre_proveedor }}</dd>
                        </div>
                        
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Teléfono
                            </dt>
                            <dd class="text-sm font-semibold text-gray-900 dark:text-white">{{ $transaccion->proveedor->telefono }}</dd>
                        </div>
                        
                        <div class="group p-3 rounded-lg bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 md:col-span-2">
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Dirección
                            </dt>
                            <dd class="text-sm font-medium text-gray-900 dark:text-white">{{ $transaccion->proveedor->direccion }}</dd>
                        </div>
                    </dl>
                </div>
                @endif

                <!-- Products Section -->
                <div class="lg:col-span-3 space-y-4">
                    <div class="flex items-center gap-2.5">
                        <div class="p-2 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Productos</h3>
                        <span class="ml-auto px-2.5 py-1 text-xs font-bold bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-full">
                            {{ count($transaccion->detalleTransacciones) }} items
                        </span>
                    </div>
                    
                    <!-- <CHANGE> Productos con diseño horizontal compacto y precios sin decimales -->
                    <div class="space-y-3">
                        @foreach($transaccion->detalleTransacciones as $detalle)
                            @if($detalle->producto)
                                <div class="group relative p-4 rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800/50 dark:to-gray-800/30 border border-gray-200 dark:border-gray-700 hover:border-purple-300 dark:hover:border-purple-600 hover:shadow-xl hover:shadow-purple-500/10 transition-all duration-300">
                                    <div class="flex items-center gap-4">
                                        <!-- Product Image -->
                                        <div class="flex-shrink-0 relative">
                                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg blur opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                            <img class="relative h-20 w-20 rounded-lg object-cover shadow-md ring-2 ring-white dark:ring-gray-700 group-hover:ring-purple-400 dark:group-hover:ring-purple-500 transition-all duration-300" 
                                                 src="{{ asset('storage/' . $detalle->producto->imagen) }}" 
                                                 alt="{{ $detalle->producto->nombre }}">
                                        </div>
                                        
                                        <!-- Product Info -->
                                        <div class="flex-1 min-w-0 space-y-2">
                                            <h4 class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-200 truncate">
                                                {{ $detalle->producto->nombre }}
                                            </h4>
                                            
                                            <div class="flex flex-wrap gap-1.5">
                                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-xs font-semibold bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                    </svg>
                                                    {{ $detalle->producto->proveedor->nombre ?? 'N/A' }}
                                                </span>
                                                
                                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-xs font-semibold bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 border border-green-200 dark:border-green-800">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                    </svg>
                                                    {{ $detalle->producto->categoria ? $detalle->producto->categoria->nombre_categoria : 'N/A' }}
                                                </span>
                                                
                                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-xs font-semibold bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 border border-purple-200 dark:border-purple-800">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                                    </svg>
                                                    Cantidad: {{ $detalle->cantidad }}
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- <CHANGE> Precios sin decimales usando number_format($precio, 0, ',', '.') -->
                                        <div class="text-right space-y-1 flex-shrink-0">
                                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Precio unitario</p>
                                            <p class="text-lg font-bold bg-gradient-to-r from-amber-600 to-yellow-600 bg-clip-text text-transparent dark:from-amber-400 dark:to-yellow-400">
                                                ${{ number_format($detalle->precio_unitario, 0, ',', '.') }}
                                            </p>
                                            <div class="pt-1.5 mt-1.5 border-t border-gray-300 dark:border-gray-600">
                                                <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Subtotal</p>
                                                <p class="text-base font-bold text-gray-900 dark:text-white">
                                                    ${{ number_format($detalle->cantidad * $detalle->precio_unitario, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border-2 border-red-200 dark:border-red-800 flex items-center gap-2.5">
                                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    <span class="text-red-700 dark:text-red-300 font-semibold text-sm">Producto no disponible</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection