@extends('layouts.admin')

@section('page-title', 'Lista de Proveedores')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="group bg-gradient-to-r from-dorado to-yellow-400 text-black font-bold py-4 px-6 rounded-2xl hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
            <span class="flex items-center space-x-2">
                <span class="text-xl">➕</span>
                <span>Crear Nuevo Proveedor</span>
            </span>
        </a>
    </div>

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
        <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 to-transparent">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Lista de Proveedores</h2>
            <div class="mt-4">
                <input type="text" id="search-proveedores" placeholder="Buscar proveedores..." class="w-full max-w-md px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200/50 dark:divide-gray-700/50">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">NIT</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Teléfono</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody id="proveedores-table-body" class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
                    @forelse($proveedores as $proveedor)
                        <tr class="hover:bg-azul-rey/5 dark:hover:bg-gray-700/30 transition-colors duration-200">
                            <td class="px-8 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $proveedor->id_proveedor }}</td>
                            <td class="px-8 py-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $proveedor->nombre }}</td>
                            <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $proveedor->nit ?? 'Sin NIT' }}</td>
                            <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $proveedor->telefono ?? 'Sin teléfono' }}</td>
                            <td class="px-8 py-6 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $proveedor->estado == 'activo' ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg' }}">
                                    {{ $proveedor->estado }}
                                </span>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-3">
                                    <a href="{{ route('proveedores.show', $proveedor) }}" class="group/btn bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                        <span class="flex items-center space-x-1">
                                            <span>👁️</span>
                                            <span>Ver</span>
                                        </span>
                                    </a>
                                    <a href="{{ route('proveedores.edit', $proveedor) }}" class="group/btn bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                        <span class="flex items-center space-x-1">
                                            <span>✏️</span>
                                            <span>Editar</span>
                                        </span>
                                    </a>
                                    <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este proveedor?')">
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
                            <td colspan="6" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    <span class="text-6xl">🏭</span>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No hay proveedores registrados</h3>
                                        <p class="text-gray-500 dark:text-gray-400">¡Comienza creando tu primer proveedor!</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 flex justify-center">
        <div class="bg-white/80 dark:bg-gris-oscuro/80 backdrop-blur-sm rounded-2xl shadow-xl p-4">
            {{ $proveedores->links() }}
        </div>
    </div>
</div>

<script>
document.getElementById('search-proveedores').addEventListener('input', function() {
    const searchTerm = this.value;
    const tableBody = document.getElementById('proveedores-table-body');

    if (searchTerm.length > 0) {
        fetch(`{{ route('proveedores.index') }}?search=${encodeURIComponent(searchTerm)}`, {
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
        // Reload the page to show all proveedores
        location.reload();
    }
});
</script>
@endsection
