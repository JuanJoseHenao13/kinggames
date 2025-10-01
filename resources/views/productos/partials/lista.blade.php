<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($productos as $producto)
        <div class="bg-blanco dark:bg-gris-oscuro rounded-lg shadow-lg overflow-hidden border-2 border-dorado">
            @if($producto->imagen && file_exists(public_path('storage/' . $producto->imagen)))
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                    <span class="text-gray-500 dark:text-gray-400 text-lg">Sin imagen</span>
                </div>
            @endif
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2 text-gray-900 dark:text-dorado">{{ $producto->nombre }}</h2>
                <p class="text-gray-700 dark:text-white mb-4">{{ Str::limit($producto->descripcion, 100) }}</p>
                <p class="text-2xl font-bold text-dorado mb-4">${{ number_format($producto->precio, 2) }}</p>
                <div class="flex justify-between">
                    <a href="{{ route('productos.show-public', $producto) }}" class="bg-azul-rey text-white font-bold py-2 px-4 rounded hover:bg-green-500 hover:text-white transition duration-300">Ver Detalles</a>
                    <form action="{{ route('cart.add', $producto) }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <button type="submit" class="bg-dorado text-negro font-bold py-2 px-4 rounded hover:bg-green-500 hover:text-white transition duration-300">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-8 mb-8">
    {{ $productos->links() }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');
        const cartCountBadge = document.getElementById('cart-count-badge');

        addToCartForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const formData = new FormData(form);
                const url = form.action;

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        if (cartCountBadge) {
                            cartCountBadge.textContent = data.cartCount;
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Hubo un problema al agregar el producto al carrito.',
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo conectar con el servidor.',
                    });
                });
            });
        });
    });
</script>

