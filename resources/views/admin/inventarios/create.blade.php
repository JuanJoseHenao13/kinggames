@extends('layouts.admin')

@section('page-title', 'Crear Inventario')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white dark:bg-gris-oscuro rounded-xl shadow-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-dorado">Crear Inventario</h1>

    <form action="{{ route('inventarios.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
        <input type="hidden" name="proveedor_id" value="{{ $producto->id_proveedor }}">

        <div>
            <label for="stock" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Stock Actual</label>
            <input type="number" name="stock" id="stock" min="0" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-azul-rey">
        </div>

        <div>
            <label for="stock_minimo" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Stock Mínimo</label>
            <input type="number" name="stock_minimo" id="stock_minimo" min="0" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-azul-rey">
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('inventarios.index', ['proveedor_id' => $producto->id_proveedor]) }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition-colors">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-azul-rey to-blue-500 text-white rounded-lg hover:from-blue-500 hover:to-blue-600 transition-all duration-300">Guardar</button>
        </div>
    </form>
</div>
@endsection
