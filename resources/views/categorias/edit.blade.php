@extends('layouts.admin')

@section('page-title', 'Editar Categoría')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white dark:bg-gris-oscuro rounded-lg shadow-lg overflow-hidden border-2 border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-dorado">Editar Categoría</h1>
        </div>
        <div class="p-6">
            <form method="POST" action="{{ route('categorias.update', $categoria) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre_categoria" class="block text-sm font-medium text-gray-700 dark:text-dorado">
                        Nombre de la Categoría
                    </label>
                    <input
                        type="text"
                        id="nombre_categoria"
                        name="nombre_categoria"
                        value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-dorado focus:border-dorado"
                        required
                    >
                    @error('nombre_categoria')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-dorado">
                        Descripción
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        rows="4"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-dorado focus:border-dorado"
                        placeholder="Ingrese la descripción de la categoría"
                        required
                    >{{ old('descripcion', $categoria->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('categorias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-dorado text-black px-4 py-2 rounded hover:bg-yellow-600 transition duration-300">
                        Actualizar Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
