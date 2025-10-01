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
