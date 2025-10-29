@extends('layouts.admin')
@section('page-title', 'Dashboard Principal')
@section('content')
<div class="max-w-7xl mx-auto space-y-8 p-6">
    <!-- Added welcome header with gradient and modern styling -->
    <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 rounded-3xl shadow-2xl p-8 mb-8">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative z-10">
            <h1 class="text-4xl font-bold text-white mb-2">Panel de Control KinGGame</h1>
            <p class="text-blue-100 text-lg">Gestiona tu imperio gaming desde un solo lugar</p>
        </div>
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -left-10 -top-10 w-48 h-48 bg-purple-300/20 rounded-full blur-2xl"></div>
    </div>

    <!-- Enhanced grid with better spacing and modern card designs -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Usuarios Card -->
        <div class="group relative bg-gradient-to-br from-white to-blue-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-blue-200 dark:border-blue-900/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
            <!-- Added animated gradient background -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-6">
                    <!-- Enhanced icon container with gradient and glow effect -->
                    <div class="relative p-4 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <div class="absolute inset-0 bg-blue-400 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <svg class="relative w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                    </div>
                    <!-- Improved stats display with better typography -->
                    <div class="text-right">
                        <p class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider mb-1">Total</p>
                        <p class="text-3xl font-black bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">{{ $totalUsuarios ?? '0' }}</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">Usuarios</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">Gestiona perfiles de jugadores y permisos del sistema</p>
                
                <!-- Enhanced status badge with icon -->
                <div class="flex items-center gap-2 mb-6 p-3 bg-green-50 dark:bg-green-900/20 rounded-xl border border-green-200 dark:border-green-800">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm font-semibold text-green-700 dark:text-green-400">
                        {{ $usuariosActivos ?? '0' }} Activos
                    </span>
                </div>
                
                <!-- Modern button with gradient and hover effects -->
                <a href="{{ route('usuarios.index') }}"
                   class="group/btn relative w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                        </svg>
                        Gestionar
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>
        </div>

        <!-- Productos Card -->
        <div class="group relative bg-gradient-to-br from-white to-purple-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-purple-200 dark:border-purple-900/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="relative p-4 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <div class="absolute inset-0 bg-purple-400 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <svg class="relative w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-semibold text-purple-600 dark:text-purple-400 uppercase tracking-wider mb-1">Total</p>
                        <p class="text-3xl font-black bg-gradient-to-r from-purple-600 to-pink-600 dark:from-purple-400 dark:to-pink-400 bg-clip-text text-transparent">{{ $totalProductos ?? '0' }}</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">Productos</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">Arsenal completo de videojuegos y contenido digital</p>
                
                <div class="flex items-center gap-2 mb-6 p-3 bg-yellow-50 dark:bg-yellow-900/20 rounded-xl border border-yellow-200 dark:border-yellow-800">
                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-sm font-semibold text-yellow-700 dark:text-yellow-400">
                        {{ $productosDestacados ?? '0' }} Destacados
                    </span>
                </div>
                
                <a href="{{ route('productos.index') }}"
                   class="group/btn relative w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                        Gestionar
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>
        </div>

        <!-- Categorías Card -->
        <div class="group relative bg-gradient-to-br from-white to-emerald-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-emerald-200 dark:border-emerald-900/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="relative p-4 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <div class="absolute inset-0 bg-emerald-400 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <svg class="relative w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider mb-1">Total</p>
                        <p class="text-3xl font-black bg-gradient-to-r from-emerald-600 to-teal-600 dark:from-emerald-400 dark:to-teal-400 bg-clip-text text-transparent">{{ $totalCategorias ?? '0' }}</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">Categorías</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">Organiza y clasifica tu catálogo estratégicamente KinGGame</p>
                
                <div class="flex items-center gap-2 mb-6 p-3 bg-green-50 dark:bg-green-900/20 rounded-xl border border-green-200 dark:border-green-800">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-semibold text-green-700 dark:text-green-400">
                        {{ $categoriasActivas ?? '0' }} Activas
                    </span>
                </div>
                
                <a href="{{ route('categorias.index') }}"
                   class="group/btn relative w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                        </svg>
                        Gestionar
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>
        </div>

        <!-- Proveedores Card -->
        <div class="group relative bg-gradient-to-br from-white to-orange-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-orange-200 dark:border-orange-900/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-amber-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="relative p-4 bg-gradient-to-br from-orange-500 to-amber-600 rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <div class="absolute inset-0 bg-orange-400 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <svg class="relative w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-semibold text-orange-600 dark:text-orange-400 uppercase tracking-wider mb-1">Total</p>
                        <p class="text-3xl font-black bg-gradient-to-r from-orange-600 to-amber-600 dark:from-orange-400 dark:to-amber-400 bg-clip-text text-transparent">{{ $totalProveedores ?? '0' }}</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors">Proveedores</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">Red de aliados y proveedores gaming</p>
                
                <div class="flex items-center gap-2 mb-6 p-3 bg-green-50 dark:bg-green-900/20 rounded-xl border border-green-200 dark:border-green-800">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-semibold text-green-700 dark:text-green-400">
                        {{ $proveedoresActivos ?? '0' }} Activos
                    </span>
                </div>
                
                <a href="{{ route('proveedores.index') }}"
                   class="group/btn relative w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-700 hover:to-amber-700 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                        Gestionar
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>
        </div>

        <!-- Inventario Card -->
        <div class="group relative bg-gradient-to-br from-white to-cyan-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-cyan-200 dark:border-cyan-900/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="relative p-4 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <div class="absolute inset-0 bg-cyan-400 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <svg class="relative w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-semibold text-cyan-600 dark:text-cyan-400 uppercase tracking-wider mb-1">Items</p>
                        <p class="text-3xl font-black bg-gradient-to-r from-cyan-600 to-blue-600 dark:from-cyan-400 dark:to-blue-400 bg-clip-text text-transparent">{{ $totalInventario ?? '0' }}</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors">Inventario</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">Control de stock digital en tiempo real</p>
                
                <div class="flex items-center gap-2 mb-6 p-3 bg-red-50 dark:bg-red-900/20 rounded-xl border border-red-200 dark:border-red-800">
                    <svg class="w-4 h-4 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-semibold text-red-700 dark:text-red-400">
                        {{ $stockBajo ?? '0' }} Stock Bajo
                    </span>
                </div>
                
                <a href="{{ route('inventarios.index') }}"
                   class="group/btn relative w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                        Gestionar
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>
        </div>

        <!-- Transacciones Card -->
        <div class="group relative bg-gradient-to-br from-white to-green-50 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-green-200 dark:border-green-900/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <div class="relative p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="relative p-4 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-all duration-500">
                        <div class="absolute inset-0 bg-green-400 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <svg class="relative w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-semibold text-green-600 dark:text-green-400 uppercase tracking-wider mb-1">Total</p>
                        <p class="text-3xl font-black bg-gradient-to-r from-green-600 to-emerald-600 dark:from-green-400 dark:to-emerald-400 bg-clip-text text-transparent">{{ $totalTransacciones ?? '0' }}</p>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">Transacciones</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 leading-relaxed">Operaciones financieras y análisis de ventas</p>
                
                <div class="flex items-center gap-2 mb-6 p-3 bg-green-50 dark:bg-green-900/20 rounded-xl border border-green-200 dark:border-green-800">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-semibold text-green-700 dark:text-green-400">
                        ${{ number_format($ingresosMes ?? 0, 0) }} Este Mes
                    </span>
                </div>
                
                <a href="{{ route('transacciones.index') }}"
                   class="group/btn relative w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white text-sm font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                        Ver Reportes
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
