@extends('layouts.admin')

@section('page-title', 'Crear Inventario')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white dark:bg-gris-oscuro rounded-xl shadow-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-dorado">Crear Inventario</h1>

    <form action="{{ route('inventarios.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
        <input type="hidden" name="proveedor_id" value="{{ $producto->id_proveedor }}">

        <!-- Mostrar Stock Actual si existe -->
        @if($producto->inventario)
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Stock Actual Disponible</label>
                <input type="text" value="{{ $producto->inventario->stock }} unidades" readonly
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white cursor-not-allowed">
            </div>
        @else
            <div class="bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-700 rounded-lg p-4">
                <p class="text-blue-800 dark:text-blue-300 text-sm">
                    <strong>Nota:</strong> Este producto no tiene inventario registrado. La cantidad que ingrese será el stock inicial.
                </p>
            </div>
        @endif

        <div>
            <label for="cantidad_agregar" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Cantidad a Agregar</label>
            <input type="number" name="cantidad_agregar" id="cantidad_agregar" min="0" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-azul-rey"
                placeholder="Ingrese la cantidad a agregar al stock">
        </div>

        <div>
            <label for="stock_minimo" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Stock Mínimo</label>
            <input type="number" name="stock_minimo" id="stock_minimo" min="0" required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-azul-rey"
                value="{{ $producto->inventario->stock_minimo ?? '' }}">
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('inventarios.index', ['proveedor_id' => $producto->id_proveedor]) }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition-colors">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-azul-rey to-blue-500 text-white rounded-lg hover:from-blue-500 hover:to-blue-600 transition-all duration-300">Guardar</button>
        </div>
    </form>
</div>
@endsection
