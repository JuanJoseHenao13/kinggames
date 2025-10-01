@extends('layouts.admin')
@section('page-title', 'Dashboard Principal')
@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    <!-- Header Stats -->

    <!-- Management Cards Grid 3x3 -->
    <div class="grid grid-cols-3 gap-6">
        <!-- Usuarios Card -->
        <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-people-fill text-blue-600 dark:text-blue-400 text-2xl"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalUsuarios ?? '0' }}</p>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Usuarios</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Gestiona perfiles de jugadores y permisos del sistema</p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">
                        <i class="bi bi-circle-fill text-xs mr-1"></i>
                        {{ $usuariosActivos ?? '0' }} Activos
                    </span>
                </div>
                <a href="{{ route('usuarios.index') }}"
                   class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <i class="bi bi-gear-fill mr-2"></i>
                    Gestionar
                </a>
            </div>
        </div>
        <!-- Productos Card -->
        <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-controller text-blue-600 dark:text-blue-400 text-2xl"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalProductos ?? '0' }}</p>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Productos</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Arsenal completo de videojuegos y contenido digital</p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-yellow-600 dark:text-yellow-400 font-medium">
                        <i class="bi bi-star-fill text-xs mr-1"></i>
                        {{ $productosDestacados ?? '0' }} Destacados
                    </span>
                </div>
                <a href="{{ route('productos.index') }}"
                   class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <i class="bi bi-plus-circle-fill mr-2"></i>
                    Gestionar
                </a>
            </div>
        </div>
        <!-- Categorías Card -->
        <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-folder-fill text-blue-600 dark:text-blue-400 text-2xl"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalCategorias ?? '0' }}</p>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Categorías</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Organiza y clasifica tu catálogo estratégicamente KinGGame</p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">
                        <i class="bi bi-check-circle-fill text-xs mr-1"></i>
                        {{ $categoriasActivas ?? '0' }} Activas
                    </span>
                </div>
                <a href="{{ route('categorias.index') }}"
                   class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <i class="bi bi-collection-fill mr-2"></i>
                    Gestionar
                </a>
            </div>
        </div>
        <!-- Proveedores Card -->
        <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-building text-blue-600 dark:text-blue-400 text-2xl"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalProveedores ?? '0' }}</p>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Proveedores</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Red estratégica de aliados y proveedores gaming</p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">
                        <i class="bi bi-check-circle-fill text-xs mr-1"></i>
                        {{ $proveedoresActivos ?? '0' }} Activos
                    </span>
                </div>
                <a href="{{ route('proveedores.index') }}"
                   class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <i class="bi bi-handshake-fill mr-2"></i>
                    Gestionar
                </a>
            </div>
        </div>
        <!-- Inventario Card -->
        <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-box-seam text-blue-600 dark:text-blue-400 text-2xl"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Items</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalInventario ?? '0' }}</p>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Inventario</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Control de stock digital en tiempo real</p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-red-600 dark:text-red-400 font-medium">
                        <i class="bi bi-exclamation-triangle-fill text-xs mr-1"></i>
                        {{ $stockBajo ?? '0' }} Stock Bajo
                    </span>
                </div>
                <a href="{{ route('inventarios.index') }}"
                   class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <i class="bi bi-bar-chart-fill mr-2"></i>
                    Gestionar
                </a>
            </div>
        </div>
        <!-- Transacciones Card -->
        <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-credit-card-fill text-blue-600 dark:text-blue-400 text-2xl"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalTransacciones ?? '0' }}</p>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Transacciones</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Operaciones financieras y análisis de ventas</p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-green-600 dark:text-green-400 font-medium">
                        <i class="bi bi-currency-dollar text-xs mr-1"></i>
                        ${{ number_format($ingresosMes ?? 0, 0) }} Este Mes
                    </span>
                </div>
                <a href="{{ route('transacciones.index') }}"
                   class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <i class="bi bi-graph-up-arrow mr-2"></i>
                    Ver Reportes
                </a>
            </div>
        </div>
    </div>
</div>
@endsection