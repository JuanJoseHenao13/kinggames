<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200/50 dark:divide-gray-700/50">
        <thead class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-700">
            <tr>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Imagen</th>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Categoría</th>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Precio</th>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Stock</th>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
            @forelse($productos as $producto)
                <tr class="hover:bg-azul-rey/5 dark:hover:bg-gray-700/30 transition-colors duration-200">
                    <td class="px-4 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $producto->id_producto }}</td>
                    <td class="px-4 py-6 whitespace-nowrap">
                        <div class="w-16 h-16 rounded-xl overflow-hidden shadow-lg ring-2 ring-azul-rey/20">
                            <img src="{{ asset('storage/' . $producto->imagen) }}?t={{ $producto->updated_at ? $producto->updated_at->timestamp : time() }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                    </td>
                    <td class="px-4 py-6 text-sm font-medium text-gray-900 dark:text-white">{{ $producto->nombre }}</td>
                    <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                        <span class="px-3 py-1 bg-azul-rey/10 dark:bg-azul-rey/20 rounded-full text-xs font-medium">
                            {{ $producto->categoria->nombre_categoria ?? 'Sin categoría' }}
                        </span>
                    </td>
                    <td class="px-4 py-6 whitespace-nowrap text-sm font-bold text-dorado dark:text-dorado">${{ number_format($producto->precio, 2) }}</td>
                    <td class="px-4 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">
                        <span class="px-3 py-1 bg-azul-rey/10 dark:bg-azul-rey/20 rounded-full text-xs font-medium">
                            📦 {{ $producto->stock }}
                        </span>
                    </td>
                    <td class="px-4 py-6 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $producto->estado == 'activo' ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg' }}">
                            <span class="flex items-center space-x-1">
                                <span>{{ $producto->estado == 'activo' ? '✅' : '❌' }}</span>
                                <span>{{ $producto->estado }}</span>
                            </span>
                        </span>
                    </td>
                    <td class="px-4 py-6 text-sm font-medium">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('productos.show', $producto) }}" class="group/btn bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                <span class="flex items-center space-x-1">
                                    <span>👁️</span>
                                    <span>Ver</span>
                                </span>
                            </a>
                            <a href="{{ route('productos.edit', $producto) }}" class="group/btn bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                <span class="flex items-center space-x-1">
                                    <span>✏️</span>
                                    <span>Editar</span>
                                </span>
                            </a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline delete-form">
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
                    <td colspan="8" class="px-8 py-12 text-center">
                        <div class="flex flex-col items-center space-y-4">
                            <span class="text-6xl">📦</span>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No hay productos registrados</h3>
                                <p class="text-gray-500 dark:text-gray-400">¡Comienza creando tu primer producto!</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-8 flex justify-center">
    <div class="bg-white/80 dark:bg-gris-oscuro/80 backdrop-blur-sm rounded-2xl shadow-xl p-4">
        {{ $productos->links() }}
    </div>
</div>
