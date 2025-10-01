<tbody class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
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
