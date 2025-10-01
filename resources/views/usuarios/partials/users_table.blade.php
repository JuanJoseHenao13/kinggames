<tbody id="usuarios-table-body" class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
    @forelse($usuarios as $usuario)
        <tr class="hover:bg-azul-rey/5 dark:hover:bg-gray-700/30 transition-colors duration-200">
            <td class="px-4 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $usuario->id_usuario }}</td>
            <td class="px-4 py-6 text-sm font-medium text-gray-900 dark:text-white">{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
            <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $usuario->email }}</td>
            <td class="px-4 py-6 whitespace-nowrap">
                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $usuario->rol == 'admin' ? 'bg-gradient-to-r from-red-500 to-red-600 text-white' : 'bg-gradient-to-r from-gray-400 to-gray-500 text-white' }}">
                    {{ $usuario->rol }}
                </span>
            </td>
            <td class="px-4 py-6 text-sm font-medium">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('usuarios.edit', $usuario) }}" class="group/btn bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                        <span class="flex items-center space-x-1">
                            <span>✏️</span>
                            <span>Editar</span>
                        </span>
                    </a>
                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="inline delete-form">
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
            <td colspan="5" class="px-8 py-12 text-center">
                <div class="flex flex-col items-center space-y-4">
                    <span class="text-6xl">👥</span>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No hay usuarios registrados</h3>
                        <p class="text-gray-500 dark:text-gray-400">¡Comienza creando tu primer usuario!</p>
                    </div>
                </div>
            </td>
        </tr>
    @endforelse
</tbody>
