@extends('layouts.cliente')

@section('page-title', $producto->nombre)

@section('content')

<!-- Título principal -->
<div class="text-center mb-12">
    <h1 class="text-4xl font-extrabold text-black dark:text-dorado tracking-tight">Detalles del Producto</h1>
</div>

<!-- Contenedor principal de las tarjetas -->
<div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8">

    <!-- Tarjeta: Imagen -->
    <div class="bg-blanco dark:bg-gris-oscuro rounded-xl shadow-2xl border-2 border-dorado p-4 flex items-center justify-center h-[500px]">
        <img
            src="{{ asset('storage/' . $producto->imagen) }}"
            alt="{{ $producto->nombre }}"
            class="object-cover w-full h-full rounded-xl shadow-lg"
        >
    </div>

    <!-- Tarjeta: Información -->
    <div class="bg-blanco dark:bg-gris-oscuro rounded-xl shadow-2xl border-2 border-dorado p-8 flex flex-col justify-between h-[500px] text-black dark:text-white">
        <div>
            <h2 class="text-3xl font-bold mb-4 text-rojo-oscuro dark:text-dorado">{{ $producto->nombre }}</h2>
            <p class="mb-6 leading-relaxed text-justify">{{ $producto->descripcion }}</p>

            <div class="space-y-2 text-sm">
                <p>
                    <strong class="text-gray-900 dark:text-dorado">Categoría:</strong>
                    <span class="text-blue-600 dark:text-blue-400">{{ $producto->categoria->nombre_categoria }}</span>
                </p>
                <p>
                    <strong class="text-rojo-oscuro dark:text-dorado">Estado:</strong>
                    <span class="text-green-600 dark:text-green-400">{{ ucfirst($producto->estado) }}</span>
                </p>
            </div>

            <p class="text-2xl font-bold text-dorado mt-4">${{ number_format($producto->precio, 0, ',', '.') }}</p>
        </div>

        <!-- Botones -->
        <div class="mt-6 space-y-3">
            <form action="{{ route('cart.add', $producto) }}" method="POST" class="add-to-cart-form">
                @csrf
                <button
                    type="submit"
                    id="btn-agregar-carrito"
                    class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-xl
                           hover:bg-green-600 hover:text-white transition duration-300
                           shadow-md hover:shadow-lg transform hover:scale-105
                           focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2">
                    Agregar al carrito 🛒
                </button>
            </form>
            <a
                href="{{ route('cliente.dashboard') }}"
                id="btn-volver"
                class="block w-full text-center bg-green-600 text-white font-bold py-3 px-4 rounded-xl
                       hover:bg-green-700 hover:text-white transition duration-300
                       shadow-md hover:shadow-lg transform hover:scale-105">
                ⬅ Volver al Dashboard
            </a>
        </div>
    </div>
</div>

<!-- Espaciado generoso entre secciones -->
<div class="my-16"></div>

<!-- Sección de Video cuadrado y grande -->
@if($videoId)
<div class="max-w-6xl mx-auto bg-blanco dark:bg-gris-oscuro rounded-xl shadow-2xl border-2 border-dorado p-6">

    <!-- Encabezado del video -->
    <div class="flex items-center mb-6">
        <div class="w-14 h-14 bg-dorado rounded-full flex items-center justify-center shadow mr-4">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-rojo-oscuro dark:text-dorado">Video Trailer</h2>
            <p class="text-gray-600 dark:text-gray-300 text-sm">Descubre más sobre este videojuego</p>
        </div>
    </div>

    <!-- Video cuadrado grande (misma altura que tarjetas) -->
    <div class="w-full h-[500px] rounded-xl overflow-hidden shadow-xl border border-gray-300 dark:border-gray-700">
        <iframe
            src="https://www.youtube.com/embed/{{ $videoId }}"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            class="w-full h-full rounded-xl">
        </iframe>
    </div>

    <!-- Pie de texto -->
    <div class="mt-4 text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400 italic">
            🎮 Video oficial del videojuego - {{ $producto->nombre }}
        </p>
    </div>
</div>
@endif

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');
        const cartCountBadge = document.querySelector('#cart-count-badge');

        addToCartForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const button = form.querySelector('button[type="submit"]');
                const originalHTML = button.innerHTML;

                // Deshabilitar botón y mostrar loading
                button.disabled = true;
                button.innerHTML = '<i class="bi bi-hourglass-split animate-spin mr-2"></i>Agregando...';

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
                        // SweetAlert moderno
                        Swal.fire({
                            icon: 'success',
                            title: '¡Agregado al Carrito! 🎮',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 2000,
                            background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                            color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#000000',
                            iconColor: '#10b981',
                            toast: true,
                            position: 'top-end',
                            timerProgressBar: true,
                            customClass: {
                                popup: 'rounded-xl shadow-2xl',
                            }
                        });

                        // Actualizar contador del carrito
                        if (cartCountBadge && data.cartCount) {
                            cartCountBadge.textContent = data.cartCount;
                            cartCountBadge.style.display = 'flex';

                            // Animación de pulso
                            cartCountBadge.classList.add('animate-ping');
                            setTimeout(() => {
                                cartCountBadge.classList.remove('animate-ping');
                            }, 1000);
                        }

                        // Restaurar botón con efecto de éxito
                        button.classList.add('!bg-green-500', '!border-green-500');
                        button.innerHTML = '<i class="bi bi-check-circle-fill mr-2"></i>¡Agregado!';

                        setTimeout(() => {
                            button.classList.remove('!bg-green-500', '!border-green-500');
                            button.innerHTML = originalHTML;
                            button.disabled = false;
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message || 'Hubo un problema al agregar el producto al carrito.',
                            background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                            color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#000000',
                            confirmButtonColor: '#3b82f6',
                            customClass: {
                                popup: 'rounded-xl shadow-2xl',
                            }
                        });

                        // Restaurar botón
                        button.innerHTML = originalHTML;
                        button.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de Conexión',
                        text: 'No se pudo conectar con el servidor. Por favor, intenta de nuevo.',
                        background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff',
                        color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#000000',
                        confirmButtonColor: '#3b82f6',
                        customClass: {
                            popup: 'rounded-xl shadow-2xl',
                        }
                    });

                    // Restaurar botón
                    button.innerHTML = originalHTML;
                    button.disabled = false;
                });
            });
        });
    });
</script>
@endsection
