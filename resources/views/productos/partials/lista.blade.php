<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($productos as $producto)
        <div class="group bg-black/70 backdrop-blur-xl rounded-3xl shadow-2xl hover:shadow-pink-500/25 overflow-hidden border-2 border-pink-500/40 transition-all duration-700 hover:-translate-y-6 hover:border-pink-400/70 hover:shadow-2xl relative will-change-transform">
            <!-- Enhanced neon glow effect -->
            <div class="absolute inset-0 bg-gradient-to-br from-pink-500/8 via-purple-500/8 to-cyan-400/8 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>

            <!-- Animated border glow -->
            <div class="absolute inset-0 rounded-3xl border-2 border-transparent group-hover:border-pink-400/30 transition-all duration-700 group-hover:shadow-[0_0_30px_rgba(236,72,153,0.3)]"></div>

            <!-- Imagen del producto -->
            <div class="relative overflow-hidden bg-gradient-to-br from-slate-800 to-slate-900 rounded-t-3xl">
                @if($producto->imagen && file_exists(public_path('storage/' . $producto->imagen)))
                    <img src="{{ asset('storage/' . $producto->imagen) }}"
                         alt="{{ $producto->nombre }}"
                         class="w-full h-56 object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110 will-change-transform">
                    <!-- Enhanced neon overlay on hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-pink-500/25 via-purple-500/10 to-cyan-400/15 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                @else
                    <div class="w-full h-56 flex items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-pink-500/10 to-cyan-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 rounded-t-3xl"></div>
                        <div class="text-center relative z-10">
                            <i class="bi bi-controller text-6xl text-pink-400 mb-2 drop-shadow-lg animate-pulse group-hover:text-pink-300 transition-colors duration-300"></i>
                            <span class="block text-pink-300 text-sm font-bold tracking-wider group-hover:text-pink-200 transition-colors duration-300">SIN IMAGEN</span>
                        </div>
                    </div>
                @endif



                <!-- New Product Badge -->
                @if($producto->created_at->diffInDays(now()) < 30)
                    <div class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-black shadow-2xl border border-red-400/50 animate-pulse">
                        <i class="bi bi-fire mr-1"></i>NUEVO
                    </div>
                @endif

                <!-- Category Badge -->
                <div class="absolute bottom-4 left-4 bg-black/80 backdrop-blur-sm text-cyan-400 px-3 py-1 rounded-full text-xs font-bold border border-cyan-400/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    {{ Str::upper($producto->categoria->nombre_categoria) }}
                </div>
            </div>

            <!-- Contenido del producto -->
            <div class="relative p-6 bg-black/50 backdrop-blur-sm">
                <!-- Título -->
                <h2 class="text-xl font-black mb-4 text-white line-clamp-2 group-hover:text-pink-400 transition-all duration-500 drop-shadow-lg">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-purple-400 to-cyan-400 group-hover:from-pink-300 group-hover:via-purple-300 group-hover:to-cyan-300 transition-all duration-500">
                        {{ $producto->nombre }}
                    </span>
                </h2>

                <!-- Descripción -->
                <p class="text-gray-300 mb-6 text-sm line-clamp-3 leading-relaxed group-hover:text-gray-200 transition-colors duration-500">
                    {{ Str::limit($producto->descripcion, 120) }}
                </p>

                <!-- Estado y Precio -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <span class="text-4xl font-black text-white">
                            ${{ number_format($producto->precio, 0, ',', '.') }}
                        </span>
                        <!-- Removed "PRECIO NEON" label and neon effect as per user request -->
                        <!-- <div class="text-xs text-cyan-400 font-bold mt-1 tracking-wider">PRECIO NEON</div> -->
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 text-xs font-bold rounded-full {{ $producto->estado === 'activo' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-red-500/20 text-red-400 border border-red-500/30' }} transition-all duration-300">
                            {{ ucfirst($producto->estado) }}
                        </span>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ request()->routeIs('cliente.*') ? route('cliente.productos.show', $producto) : route('productos.show-public', $producto) }}"
                       class="flex-1 inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600 text-white font-black py-4 px-6 rounded-2xl
                              hover:from-purple-500 hover:to-pink-500 transition-all duration-500 shadow-xl hover:shadow-purple-500/40
                              border-2 border-purple-500/60 hover:border-purple-400 group/btn transform hover:scale-105 active:scale-95 will-change-transform">
                        <i class="bi bi-eye-fill mr-3 text-xl group-hover/btn:scale-110 transition-transform duration-300 drop-shadow-lg"></i>
                        <span class="drop-shadow-lg">VER DETALLES</span>
                    </a>

                    <form action="{{ route('cart.add', $producto) }}" method="POST" class="add-to-cart-form flex-1">
                        @csrf
                        <button type="submit"
                                class="w-full inline-flex items-center justify-center bg-black/80 text-cyan-400 font-black py-4 px-6 rounded-2xl
                                       border-2 border-cyan-500/60 hover:bg-cyan-500 hover:text-black hover:border-cyan-400
                                       transition-all duration-500 shadow-xl hover:shadow-cyan-400/40 group/cart
                                       transform hover:scale-105 active:scale-95 backdrop-blur-sm will-change-transform">
                            <i class="bi bi-cart-plus-fill mr-3 text-xl group-hover/cart:scale-110 transition-transform duration-300 drop-shadow-lg"></i>
                            <span class="hidden sm:inline drop-shadow-lg">AGREGAR</span>
                            <span class="sm:hidden text-2xl drop-shadow-lg">+</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Enhanced Neon bottom border -->
            <div class="h-3 bg-gradient-to-r from-pink-500 via-purple-500 to-cyan-400 shadow-lg shadow-pink-500/60 group-hover:shadow-pink-400/80 transition-shadow duration-500"></div>
        </div>
    @endforeach
</div>

<!-- Paginación -->
<div class="mt-12 mb-8 flex justify-center">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-4 border border-gray-200 dark:border-gray-700">
        {{ $productos->links() }}
    </div>
</div>

<style>
    /* Estilos personalizados para la paginación */
    .pagination {
        @apply flex items-center space-x-2;
    }
    
    .pagination a,
    .pagination span {
        @apply px-4 py-2 rounded-lg font-semibold text-sm transition-all duration-300;
    }
    
    .pagination a {
        @apply bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-cyan-600 hover:text-white hover:shadow-lg;
    }
    
    .pagination .active span {
        @apply bg-gradient-to-r from-blue-600 to-cyan-600 text-white shadow-lg;
    }
    
    .pagination .disabled span {
        @apply bg-gray-100 dark:bg-gray-700 text-gray-400 dark:text-gray-600 cursor-not-allowed;
    }
    
    /* Line clamp utility */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

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