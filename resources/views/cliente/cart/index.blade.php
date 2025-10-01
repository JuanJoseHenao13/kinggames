@extends('layouts.cliente')

@section('page-title', 'Carrito de compras')

@section('content')
@if(count($cartItems) > 0)
    <div class="bg-blanco dark:bg-gris-oscuro rounded-lg shadow-lg overflow-hidden border-2 border-dorado p-6">
        <table class="w-full">
            <thead>
                <tr class="border-b-2 border-dorado">
                    <th class="text-left py-2 text-black dark:text-dorado">Producto</th>
                    <th class="text-right py-2 text-black dark:text-dorado">Precio</th>
                    <th class="text-right py-2 text-black dark:text-dorado">Cantidad</th>
                    <th class="text-right py-2 text-black dark:text-dorado">Subtotal</th>
                    <th class="text-right py-2 text-black dark:text-dorado">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr class="border-b border-gray-200 dark:border-gray-700" id="row-{{ $item->id }}">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="{{ asset('storage/' . $item->attributes->imagen) }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-16 h-16 object-cover mr-4">
                                <span class="text-gray-700 dark:text-white">{{ $item->name }}</span>
                            </div>
                        </td>
                        <td class="text-right py-4 text-gray-700 dark:text-white" 
                            id="price-{{ $item->id }}">
                            ${{ number_format($item->price, 2) }}
                        </td>
                        <td class="text-right py-4">
                            <div class="flex items-center justify-end quantity-controls" 
                                 data-id="{{ $item->id }}" 
                                 data-url="{{ route('cart.update', $item->id) }}">
                                <button class="quantity-btn minus-btn bg-gray-300 dark:bg-gray-600 text-black dark:text-white font-bold py-1 px-3 rounded-l hover:bg-gray-400">-</button>
                                <input type="text" name="cantidad" value="{{ $item->quantity }}" 
                                       min="1" max="{{ $item->associatedModel->inventario?->stock ?? 99 }}" 
                                       class="w-12 text-center bg-white dark:bg-gray-700 border-t border-b border-gray-300 dark:border-gray-600 dark:text-white font-bold" readonly>
                                <button class="quantity-btn plus-btn bg-gray-300 dark:bg-gray-600 text-black dark:text-white font-bold py-1 px-3 rounded-r hover:bg-gray-400">+</button>
                            </div>
                        </td>
                        <td class="text-right py-4 text-gray-700 dark:text-white" 
                            id="subtotal-{{ $item->id }}">
                            ${{ number_format($item->price * $item->quantity, 2) }}
                        </td>
                        <td class="text-right py-4">
                            <form action="{{ route('cart.remove', $item->id) }}" 
                                  method="POST" 
                                  class="inline-block remove-form" 
                                  data-id="{{ $item->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-sm bg-red-600 text-white font-bold py-1 px-2 rounded hover:bg-azul-rey hover:text-white transition duration-300">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6 text-right">
            <p class="text-xl font-bold text-rojo-oscuro dark:text-dorado">
                Total: $<span id="cart-total">{{ number_format($total, 2) }}</span>
            </p>
            <a href="{{ route('cliente.productos.index') }}" 
               class="mt-4 inline-block bg-dorado text-blanco font-bold py-2 px-4 rounded hover:bg-dorado hover:text-negro transition duration-300">
                Seguir comprando
            </a>
            <form action="{{ route('checkout.process') }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="mt-4 inline-block bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition duration-300">
                    Procesar Compra
                </button>
            </form>
        </div>
    </div>
@else
    <div class="text-center">
        <p class="text-xl mb-4 text-gray-700 dark:text-white">No hay productos en el carrito.</p>
        <a href="{{ route('cliente.productos.index') }}" 
           class="bg-dorado text-blanco font-bold py-2 px-4 rounded hover:bg-dorado hover:text-negro transition duration-300">
            Ver productos
        </a>
    </div>
@endif

@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Actualizar cantidades ---
    document.querySelectorAll('.quantity-controls').forEach(controls => {
        const minusBtn = controls.querySelector('.minus-btn');
        const plusBtn = controls.querySelector('.plus-btn');
        const quantityInput = controls.querySelector('input[name="cantidad"]');
        const productId = controls.dataset.id;
        const updateUrl = controls.dataset.url;

        minusBtn.addEventListener('click', function () {
            let currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 1) {
                updateQuantity(productId, currentQuantity - 1, updateUrl, quantityInput);
            }
        });

        plusBtn.addEventListener('click', function () {
            let currentQuantity = parseInt(quantityInput.value);
            let maxQuantity = parseInt(quantityInput.max);
            if (currentQuantity < maxQuantity) {
                updateQuantity(productId, currentQuantity + 1, updateUrl, quantityInput);
            } else {
                Swal.fire({
                    title: "Stock limitado",
                    text: `No puedes agregar más de ${maxQuantity} unidades de este producto.`,
                    icon: "warning",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    });

    function updateQuantity(productId, newQuantity, url, inputElement) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(url, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ cantidad: newQuantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                inputElement.value = newQuantity;
                document.getElementById(`subtotal-${productId}`).innerText = '$' + data.subtotal;
                document.getElementById('cart-total').innerText = data.total;
                updateCartCount(data.cartCount);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // --- Eliminar productos ---
    document.querySelectorAll('.remove-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const url = this.action;
            const csrfToken = this.querySelector('input[name="_token"]').value;
            const productId = this.dataset.id;

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`row-${productId}`).remove();
                    document.getElementById('cart-total').innerText = data.total;
                    updateCartCount(data.cartCount);
                    Swal.fire({
                        title: "Eliminado",
                        text: data.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    
});
</script>
@endsection
