@foreach($productos as $producto)
    <div class="bg-blanco dark:bg-gris-oscuro rounded-lg shadow-lg overflow-hidden border-2 border-dorado flex flex-col">
        <a href="{{ route('productos.show-public', $producto) }}">
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover">
        </a>
        <div class="p-4 flex flex-col flex-grow">
            <div class="flex-grow">
                <h3 class="text-xl font-bold mb-2 text-black dark:text-dorado">{{ $producto->nombre }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2"><strong>Categoría:</strong> {{ $producto->categoria->nombre_categoria }}</p>
                <p class="text-sm text-gray-700 dark:text-white mb-3">{{ Str::limit($producto->descripcion, 150) }}</p>
            </div>
            <div class="flex justify-between items-center mb-3">
                <p class="text-2xl font-bold text-dorado">${{ number_format($producto->precio, 2) }}</p>
                <span class="px-2 py-1 text-xs font-medium rounded-full {{ $producto->estado === 'activo' ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100' }}">
                    {{ ucfirst($producto->estado) }}
                </span>
            </div>
            <div class="flex justify-between items-center">
                <a href="{{ route('productos.show-public', $producto) }}" class="text-sm text-center bg-blue-500 text-white font-bold py-2 px-3 rounded hover:bg-green-500 hover:text-white transition duration-300">Ver detalles</a>
                <form action="{{ route('cart.add', $producto) }}" method="POST" class="add-to-cart-form">
                    @csrf
                    <button type="submit" class="text-sm bg-dorado text-black font-bold py-2 px-3 rounded hover:bg-yellow-600 transition duration-300">Agregar al carrito</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
