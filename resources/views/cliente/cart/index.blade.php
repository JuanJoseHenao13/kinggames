@extends('layouts.cliente')

@section('page-title', 'Carrito de compras')

@section('content')
<div class="space-y-6">
    <!-- Header del carrito -->
    <div class="bg-gradient-to-r from-purple-700 to-purple-800 dark:from-purple-900 dark:to-purple-950 rounded-xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="bg-white/20 backdrop-blur-sm rounded-lg p-3">
                    <i class="bi bi-cart-fill text-white text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-white">Mi Carrito</h1>
                    <p class="text-purple-100 dark:text-purple-200">{{ count($cartItems) }} {{ count($cartItems) == 1 ? 'producto' : 'productos' }} en tu carrito</p>
                </div>
            </div>
        </div>
    </div>

    @if(count($cartItems) > 0)
        <!-- Tabla de productos -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">
            <!-- Versión Desktop -->
            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 border-b-2 border-purple-500 dark:border-purple-600">
                            <th class="text-left py-4 px-6 text-gray-900 dark:text-gray-100 font-bold">Producto</th>
                            <th class="text-center py-4 px-4 text-gray-900 dark:text-gray-100 font-bold">Precio</th>
                            <th class="text-center py-4 px-4 text-gray-900 dark:text-gray-100 font-bold">Cantidad</th>
                            <th class="text-center py-4 px-4 text-gray-900 dark:text-gray-100 font-bold">Subtotal</th>
                            <th class="text-center py-4 px-4 text-gray-900 dark:text-gray-100 font-bold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" id="row-{{ $item->id }}">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-4">
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $item->attributes->imagen) }}" 
                                                 alt="{{ $item->name }}" 
                                                 class="w-20 h-20 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-600 group-hover:border-purple-500 dark:group-hover:border-purple-400 transition-colors">
                                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 rounded-lg transition-colors"></div>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-gray-900 dark:text-gray-100 block">{{ $item->name }}</span>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $item->attributes->categoria ?? 'Videojuego' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center py-4 px-4 text-gray-900 dark:text-gray-100 font-bold"
                                    id="price-{{ $item->id }}">
                                    ${{ number_format($item->price, 0, ',', '.') }}
                                </td>
                                <td class="text-center py-4 px-4">
                                    <div class="flex items-center justify-center quantity-controls" 
                                         data-id="{{ $item->id }}" 
                                         data-url="{{ route('cart.update', $item->id) }}">
                                        <button class="quantity-btn minus-btn bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold py-2 px-3 rounded-l-lg hover:bg-purple-500 hover:text-white dark:hover:bg-purple-600 transition-all duration-200 border border-gray-300 dark:border-gray-600">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="text" name="cantidad" value="{{ $item->quantity }}" 
                                               min="1" max="{{ $item->associatedModel->inventario?->stock ?? 99 }}" 
                                               class="w-16 text-center bg-white dark:bg-gray-800 border-t border-b border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 font-bold py-2" readonly>
                                        <button class="quantity-btn plus-btn bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold py-2 px-3 rounded-r-lg hover:bg-purple-500 hover:text-white dark:hover:bg-purple-600 transition-all duration-200 border border-gray-300 dark:border-gray-600">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="text-center py-4 px-4 text-purple-600 dark:text-purple-400 font-bold text-lg"
                                    id="subtotal-{{ $item->id }}">
                                    ${{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </td>
                                <td class="text-center py-4 px-4">
                                    <form action="{{ route('cart.remove', $item->id) }}" 
                                          method="POST" 
                                          class="inline-block remove-form" 
                                          data-id="{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 dark:bg-red-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600 dark:hover:bg-red-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Versión Mobile -->
            <div class="lg:hidden divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($cartItems as $item)
                    <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-750 transition-colors" id="row-mobile-{{ $item->id }}">
                        <div class="flex gap-4">
                            <img src="{{ asset('storage/' . $item->attributes->imagen) }}" 
                                 alt="{{ $item->name }}" 
                                 class="w-24 h-24 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-600">
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $item->name }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">{{ $item->attributes->categoria ?? 'Videojuego' }}</p>
                                <p class="text-lg font-bold text-purple-600 dark:text-purple-400" id="price-mobile-{{ $item->id }}">
                                    ${{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center quantity-controls" 
                                 data-id="{{ $item->id }}" 
                                 data-url="{{ route('cart.update', $item->id) }}">
                                <button class="quantity-btn minus-btn bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold py-2 px-3 rounded-l-lg hover:bg-purple-500 hover:text-white transition-all">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="text" name="cantidad" value="{{ $item->quantity }}" 
                                       min="1" max="{{ $item->associatedModel->inventario?->stock ?? 99 }}" 
                                       class="w-14 text-center bg-white dark:bg-gray-800 border-t border-b border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 font-bold py-2" readonly>
                                <button class="quantity-btn plus-btn bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold py-2 px-3 rounded-r-lg hover:bg-purple-500 hover:text-white transition-all">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            
                            <div class="text-right">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Subtotal</p>
                                <p class="text-lg font-bold text-purple-600 dark:text-purple-400" id="subtotal-mobile-{{ $item->id }}">
                                    ${{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <form action="{{ route('cart.remove', $item->id) }}" 
                                  method="POST" 
                                  class="remove-form" 
                                  data-id="{{ $item->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full bg-red-500 dark:bg-red-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600 dark:hover:bg-red-700 transition-all">
                                    <i class="bi bi-trash"></i> Eliminar producto
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Panel de total y acciones -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total a pagar</p>
                    <p class="text-3xl md:text-4xl font-black text-purple-600 dark:text-purple-400">
                        $<span id="cart-total">{{ number_format($total, 0, ',', '.') }}</span>
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('cliente.productos.index') }}" 
                       class="inline-flex items-center justify-center gap-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-bold py-3 px-6 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-200 shadow-md hover:shadow-lg">
                        <i class="bi bi-arrow-left-circle"></i>
                        Seguir comprando
                    </a>
                    <form action="{{ route('checkout.process') }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 dark:from-green-600 dark:to-emerald-700 text-white font-bold py-3 px-6 rounded-lg hover:from-green-600 hover:to-emerald-700 dark:hover:from-green-700 dark:hover:to-emerald-800 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                            <i class="bi bi-credit-card"></i>
                            Procesar Compra
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <!-- Carrito vacío -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl p-12 text-center border border-gray-200 dark:border-gray-700">
            <div class="inline-block bg-gray-100 dark:bg-gray-900 rounded-full p-6 mb-6">
                <i class="bi bi-cart-x text-6xl text-gray-400 dark:text-gray-500"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">Tu carrito está vacío</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-6">¡Explora nuestro catálogo y encuentra tus videojuegos favoritos!</p>
            <a href="{{ route('cliente.productos.index') }}" 
               class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-pink-600 dark:from-purple-700 dark:to-pink-700 text-white font-bold py-3 px-8 rounded-lg hover:from-purple-700 hover:to-pink-700 dark:hover:from-purple-800 dark:hover:to-pink-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                <i class="bi bi-controller"></i>
                Ver productos
            </a>
        </div>
    @endif
</div>
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
                    showConfirmButton: false,
                    background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                    color: document.documentElement.classList.contains('dark') ? '#f3f4f6' : '#111827'
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
                // Actualizar todos los inputs de cantidad (desktop y mobile)
                document.querySelectorAll(`.quantity-controls[data-id="${productId}"] input[name="cantidad"]`).forEach(input => {
                    input.value = newQuantity;
                });
                
                // Actualizar subtotales (desktop y mobile)
                const subtotalElements = [
                    document.getElementById(`subtotal-${productId}`),
                    document.getElementById(`subtotal-mobile-${productId}`)
                ];
                subtotalElements.forEach(el => {
                    if (el) el.innerText = '$' + data.subtotal;
                });
                
                // Actualizar total
                document.getElementById('cart-total').innerText = data.total;
                
                // Actualizar contador del carrito en el navbar
                if (typeof updateCartCount === 'function') {
                    updateCartCount(data.cartCount);
                }

                // Mostrar feedback visual
                inputElement.classList.add('scale-110');
                setTimeout(() => inputElement.classList.remove('scale-110'), 200);
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

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Se eliminará este producto del carrito",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                color: document.documentElement.classList.contains('dark') ? '#f3f4f6' : '#111827'
            }).then((result) => {
                if (result.isConfirmed) {
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
                            // Eliminar filas (desktop y mobile)
                            const rowDesktop = document.getElementById(`row-${productId}`);
                            const rowMobile = document.getElementById(`row-mobile-${productId}`);
                            
                            [rowDesktop, rowMobile].forEach(row => {
                                if (row) {
                                    row.style.opacity = '0';
                                    row.style.transform = 'translateX(-100%)';
                                    setTimeout(() => row.remove(), 300);
                                }
                            });
                            
                            // Actualizar total
                            document.getElementById('cart-total').innerText = data.total;
                            
                            // Actualizar contador
                            if (typeof updateCartCount === 'function') {
                                updateCartCount(data.cartCount);
                            }
                            
                            Swal.fire({
                                title: "¡Eliminado!",
                                text: data.message,
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false,
                                background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                                color: document.documentElement.classList.contains('dark') ? '#f3f4f6' : '#111827'
                            });

                            // Si el carrito queda vacío, recargar la página
                            if (data.cartCount === 0) {
                                setTimeout(() => location.reload(), 1500);
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    });
});
</script>
@endsection