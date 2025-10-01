@extends('layouts.admin')

@section('page-title', 'Gestión de Categorías')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Categorías</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Organiza tus productos por categorías</p>
        </div>
        <a href="{{ route('categorias.create') }}" class="group bg-gradient-to-r from-dorado to-yellow-400 text-black font-bold py-4 px-6 rounded-2xl hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
            <span class="flex items-center space-x-2">
                <span class="text-xl">➕</span>
                <span>Crear Nueva Categoría</span>
            </span>
        </a>
    </div>

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
        <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 to-transparent flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Lista de Categorías</h2>
            <input type="text" id="search-categorias" placeholder="Buscar categorías..." class="px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-dorado focus:border-transparent" />
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200/50 dark:divide-gray-700/50">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Descripción</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody id="categorias-table-body" class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
                    @forelse($categorias as $categoria)
                        <tr class="hover:bg-azul-rey/5 dark:hover:bg-gray-700/30 transition-colors duration-200">
                            <td class="px-8 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $categoria->id_categoria }}</td>
                            <td class="px-8 py-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                <span class="flex items-center space-x-2">
                                    <span class="text-lg">📁</span>
                                    <span>{{ $categoria->nombre_categoria }}</span>
                                </span>
                            </td>
                            <td class="px-8 py-6 text-sm text-gray-700 dark:text-gray-300 max-w-xs">
                                <div class="bg-azul-rey/5 dark:bg-azul-rey/10 rounded-lg p-3">
                                    {{ Str::limit($categoria->descripcion, 80) }}
                                </div>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-3">
                                    <a href="{{ route('categorias.edit', $categoria) }}" class="group/btn bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                        <span class="flex items-center space-x-1">
                                            <span>✏️</span>
                                            <span>Editar</span>
                                        </span>
                                    </a>
                                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta categoría?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="group/btn bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                            <span class="flex items-center space-x-1">
                                                <span>🗑️</span>
                                                <span>Eliminar</span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    <span class="text-6xl">📂</span>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No hay categorías registradas</h3>
                                        <p class="text-gray-500 dark:text-gray-400">¡Crea tu primera categoría para organizar tus productos!</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $categorias->links() }}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-categorias');
    const tableBody = document.getElementById('categorias-table-body');

    searchInput.addEventListener('input', function () {
        const query = this.value;

        fetch(`{{ route('categorias.index') }}?search=${encodeURIComponent(query)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = data.view;
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
    });
});
</script>
@endsection
