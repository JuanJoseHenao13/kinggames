<tbody class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
    @forelse($productos as $producto)
        <tr class="hover:bg-azul-rey/5 dark:hover:bg-gray-700/30 transition-colors duration-200">
            <td class="px-8 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $producto->id_producto }}</td>
            <td class="px-8 py-6 whitespace-nowrap">
                <div class="w-16 h-16 rounded-xl overflow-hidden shadow-lg ring-2 ring-azul-rey/20">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                </div>
            </td>
            <td class="px-8 py-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $producto->nombre }}</td>
            <td class="px-8 py-6 whitespace-nowrap text-sm font-bold text-dorado dark:text-dorado">${{ number_format($producto->precio, 2) }}</td>
            <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                @if($producto->inventario)
                    <span class="font-semibold">{{ $producto->inventario->stock }}</span>
                @else
                    <span class="text-red-500">Sin inventario</span>
                @endif
            </td>
            <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                @if($producto->inventario)
                    <span class="font-semibold">{{ $producto->inventario->stock_minimo }}</span>
                @else
                    <span class="text-red-500">Sin inventario</span>
                @endif
            </td>
            <td class="px-8 py-6 whitespace-nowrap">
                @if($producto->inventario)
                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $producto->inventario->stock > $producto->inventario->stock_minimo ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg' }}">
                        {{ $producto->inventario->stock > $producto->inventario->stock_minimo ? 'En Stock' : 'Bajo Stock' }}
                    </span>
                @else
                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-gray-400 to-gray-500 text-white shadow-lg">
                        Sin Inventario
                    </span>
                @endif
            </td>
            <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                @if($producto->inventario)
                    <div class="flex space-x-2">
                        <a href="{{ route('inventarios.edit', $producto->inventario->id_inventario) }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95 inline-block">
                            <span class="text-xs">✏️</span>
                        </a>
                        <button onclick="deleteInventario({{ $producto->inventario->id_inventario }})" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                            <span class="text-xs">🗑️</span>
                        </button>
                    </div>
                @else
                    <a href="{{ route('inventarios.create.with.product', $producto->id_producto) }}" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95 inline-block">
                        <span class="text-xs">➕</span>
                    </a>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="px-8 py-12 text-center">
                <div class="flex flex-col items-center space-y-4">
                    <span class="text-6xl">📦</span>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No hay productos para este proveedor</h3>
                        <p class="text-gray-500 dark:text-gray-400">Selecciona otro proveedor o crea productos para este proveedor.</p>
                    </div>
                </div>
            </td>
        </tr>
    @endforelse
</tbody>
