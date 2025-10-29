@extends('layouts.admin')

@section('page-title', 'Editar Inventario')

@section('content')
<div class="min-h-screen flex items-center justify-center p-6">
    <div class="max-w-2xl w-full bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden">
        <!-- Header con gradiente y mejor diseño -->
        <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-white/20 backdrop-blur-sm p-3 rounded-2xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-white">Editar Inventario</h1>
                    <p class="text-blue-100 text-sm mt-1">Actualiza los niveles de stock del producto</p>
                </div>
            </div>
        </div>

        <!-- Formulario con mejor diseño y espaciado -->
        <form action="{{ route('inventarios.update', $inventario->id_inventario) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PATCH')

            <!-- Campo Stock Actual con icono y mejor diseño -->
            <div class="group">
                <label for="stock" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3 flex items-center space-x-2">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span>Stock Actual</span>
                </label>
                <div class="relative">
                    <input type="text" value="{{ $inventario->stock }} unidades" readonly
                        class="w-full px-5 py-4 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white text-lg font-semibold cursor-not-allowed">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Cantidad disponible en el inventario</span>
                </p>
            </div>

            <!-- Campo Cantidad a Agregar con icono y mejor diseño -->
            <div class="group">
                <label for="cantidad_agregar" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3 flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Cantidad a Agregar</span>
                </label>
                <div class="relative">
                    <input type="number" name="cantidad_agregar" id="cantidad_agregar" min="0" required
                        class="w-full px-5 py-4 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white text-lg font-semibold focus:outline-none focus:ring-4 focus:ring-green-500/20 focus:border-green-500 transition-all duration-300 group-hover:border-green-300 dark:group-hover:border-green-500">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Cantidad que se agregará al stock actual</span>
                </p>
            </div>

            <!-- Campo Stock Mínimo con icono y mejor diseño -->
            <div class="group">
                <label for="stock_minimo" class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3 flex items-center space-x-2">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span>Stock Mínimo</span>
                </label>
                <div class="relative">
                    <input type="number" name="stock_minimo" id="stock_minimo" min="0" value="{{ $inventario->stock_minimo }}" required
                        class="w-full px-5 py-4 pl-12 border-2 border-gray-200 dark:border-gray-600 rounded-xl bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white text-lg font-semibold focus:outline-none focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-300 group-hover:border-amber-300 dark:group-hover:border-amber-500">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Nivel de alerta para reabastecimiento</span>
                </p>
            </div>

            <!-- Botones con mejor diseño y animaciones -->
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('inventarios.index') }}" 
                    class="group px-6 py-3 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-xl font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300 flex items-center justify-center space-x-2 hover:scale-105 active:scale-95">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Cancelar</span>
                </a>
                <button type="submit" 
                    class="group px-6 py-3 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 text-white rounded-xl font-semibold hover:shadow-xl hover:shadow-blue-500/50 transition-all duration-300 flex items-center justify-center space-x-2 hover:scale-105 active:scale-95">
                    <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Actualizar Inventario</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
