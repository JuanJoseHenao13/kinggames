@extends('layouts.admin')

@section('page-title', 'Lista de Proveedores')

@section('content')
<div class="space-y-8">
    <!-- Encabezado -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
        <div>
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent flex items-center gap-3">
                <span class="text-5xl">🏢</span>
                Proveedores
            </h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2 text-lg">Gestiona todos tus proveedores y socios comerciales</p>
        </div>
        <a href="{{ route('proveedores.create') }}" class="group bg-gradient-to-r from-dorado to-yellow-400 text-black font-bold py-4 px-8 rounded-2xl hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl active:scale-95 shadow-lg">
            <span class="flex items-center space-x-3">
                <span class="text-2xl group-hover:rotate-90 transition-transform duration-300">➕</span>
                <span>Crear Nuevo Proveedor</span>
            </span>
        </a>
    </div>

    <!-- Tarjeta Principal -->
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-3xl shadow-2xl overflow-hidden border-2 border-azul-rey/20 dark:border-azul-rey/30">
        
        <!-- Header con búsqueda -->
        <div class="px-8 py-6 border-b-2 border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 via-blue-500/5 to-transparent">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent flex items-center gap-2">
                        <span>📋</span>
                        Lista de Proveedores
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Administra la información de tus proveedores</p>
                </div>
                
                <!-- Buscador mejorado -->
                <div class="relative w-full lg:w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <span class="text-xl">🔍</span>
                    </div>
                    <input 
                        type="text" 
                        id="search-proveedores" 
                        placeholder="Buscar proveedores..." 
                        class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-black dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dorado focus:border-transparent transition-all duration-300 shadow-sm hover:shadow-md"
                    />
                </div>
            </div>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200/50 dark:divide-gray-700/50">
                <thead class="bg-gradient-to-r from-gray-100 via-blue-50 to-gray-100 dark:from-gray-800 dark:via-gray-750 dark:to-gray-800">
                    <tr>
                        <th class="px-8 py-5 text-left text-xs font-extrabold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            <span class="flex items-center gap-2">
                                <span class="text-base">#️⃣</span>
                                <span>ID</span>
                            </span>
                        </th>
                        <th class="px-8 py-5 text-left text-xs font-extrabold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            <span class="flex items-center gap-2">
                                <span class="text-base">🏭</span>
                                <span>Nombre</span>
                            </span>
                        </th>
                        <th class="px-8 py-5 text-left text-xs font-extrabold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            <span class="flex items-center gap-2">
                                <span class="text-base">🆔</span>
                                <span>NIT</span>
                            </span>
                        </th>
                        <th class="px-8 py-5 text-left text-xs font-extrabold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            <span class="flex items-center gap-2">
                                <span class="text-base">📞</span>
                                <span>Teléfono</span>
                            </span>
                        </th>
                        <th class="px-8 py-5 text-left text-xs font-extrabold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            <span class="flex items-center gap-2">
                                <span class="text-base">⚡</span>
                                <span>Estado</span>
                            </span>
                        </th>
                        <th class="px-8 py-5 text-left text-xs font-extrabold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            <span class="flex items-center gap-2">
                                <span class="text-base">⚙️</span>
                                <span>Acciones</span>
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody id="proveedores-table-body" class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
                    @forelse($proveedores as $proveedor)
                        <tr class="group hover:bg-gradient-to-r hover:from-azul-rey/10 hover:to-blue-500/5 dark:hover:from-gray-700/40 dark:hover:to-gray-700/20 transition-all duration-300">
                            <!-- ID -->
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                                        <span class="text-white font-bold text-lg">{{ $proveedor->id_proveedor }}</span>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Nombre -->
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-500 rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                                        <span class="text-2xl">🏭</span>
                                    </div>
                                    <div>
                                        <div class="text-base font-bold text-gray-900 dark:text-white">{{ $proveedor->nombre }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">Proveedor</div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- NIT -->
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100/50 dark:from-purple-900/20 dark:to-purple-800/10 rounded-lg px-4 py-2 border border-purple-200/50 dark:border-purple-500/30 inline-block">
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">{{ $proveedor->nit ?? 'Sin NIT' }}</span>
                                </div>
                            </td>
                            
                            <!-- Teléfono -->
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-green-500 rounded-lg flex items-center justify-center">
                                        <span class="text-sm">📱</span>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $proveedor->telefono ?? 'Sin teléfono' }}</span>
                                </div>
                            </td>
                            
                            <!-- Estado -->
                            <td class="px-8 py-6 whitespace-nowrap">
                                <span class="px-4 py-2 inline-flex text-xs leading-5 font-bold rounded-full 
                                    {{ $proveedor->estado == 'activo' ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg shadow-green-500/50' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg shadow-red-500/50' }}">
                                    {{ ucfirst($proveedor->estado) }}
                                </span>
                            </td>
                            
                            <!-- Acciones -->
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <!-- Botón Ver -->
                                    <a href="{{ route('proveedores.show', $proveedor) }}" 
                                       class="group/btn relative bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2.5 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-110 hover:shadow-xl active:scale-95 shadow-md overflow-hidden"
                                       title="Ver detalles">
                                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                                        <span class="relative flex items-center space-x-1.5">
                                            <span class="text-lg">👁️</span>
                                            <span class="font-semibold">Ver</span>
                                        </span>
                                    </a>
                                    
                                    <!-- Botón Editar -->
                                    <a href="{{ route('proveedores.edit', $proveedor) }}" 
                                       class="group/btn relative bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2.5 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-110 hover:shadow-xl active:scale-95 shadow-md overflow-hidden"
                                       title="Editar proveedor">
                                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                                        <span class="relative flex items-center space-x-1.5">
                                            <span class="text-lg">✏️</span>
                                            <span class="font-semibold">Editar</span>
                                        </span>
                                    </a>
                                    
                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="inline" onsubmit="return confirm('⚠️ ¿Estás seguro de que quieres eliminar este proveedor?\n\nEsta acción no se puede deshacer.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="group/btn relative bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2.5 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-110 hover:shadow-xl active:scale-95 shadow-md overflow-hidden"
                                                title="Eliminar proveedor">
                                            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                                            <span class="relative flex items-center space-x-1.5">
                                                <span class="text-lg">🗑️</span>
                                                <span class="font-semibold">Eliminar</span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-16">
                                <div class="flex flex-col items-center justify-center space-y-6">
                                    <!-- Icono animado -->
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-yellow-400 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                                        <div class="relative w-32 h-32 bg-gradient-to-br from-orange-100 to-yellow-100 dark:from-orange-900/30 dark:to-yellow-900/30 rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-7xl animate-bounce">🏭</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Mensaje -->
                                    <div class="text-center space-y-3 max-w-md">
                                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                                            No hay proveedores registrados
                                        </h3>
                                        <p class="text-gray-500 dark:text-gray-400 text-lg">
                                            ¡Comienza creando tu primer proveedor para gestionar tu inventario!
                                        </p>
                                        <div class="pt-4">
                                            <a href="{{ route('proveedores.create') }}" 
                                               class="inline-flex items-center space-x-2 bg-gradient-to-r from-dorado to-yellow-400 text-black font-bold py-3 px-6 rounded-xl hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                                <span class="text-xl">➕</span>
                                                <span>Crear Primer Proveedor</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer con paginación -->
        @if($proveedores->hasPages())
        <div class="px-8 py-6 border-t-2 border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-transparent via-blue-500/5 to-transparent">
            <div class="flex justify-center">
                {{ $proveedores->links() }}
            </div>
        </div>
        @endif
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 shadow-xl text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-semibold uppercase tracking-wide">Total Proveedores</p>
                    <p class="text-4xl font-extrabold mt-2">{{ $proveedores->total() }}</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <span class="text-4xl">📊</span>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 shadow-xl text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-semibold uppercase tracking-wide">Activos</p>
                    <p class="text-4xl font-extrabold mt-2">{{ $proveedores->where('estado', 'activo')->count() }}</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <span class="text-4xl">✅</span>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 shadow-xl text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-semibold uppercase tracking-wide">Página Actual</p>
                    <p class="text-4xl font-extrabold mt-2">{{ $proveedores->currentPage() }}</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <span class="text-4xl">📄</span>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 shadow-xl text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-semibold uppercase tracking-wide">Por Página</p>
                    <p class="text-4xl font-extrabold mt-2">{{ $proveedores->perPage() }}</p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                    <span class="text-4xl">📑</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-proveedores');
    const tableBody = document.getElementById('proveedores-table-body');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value;

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
});
</script>
@endsection