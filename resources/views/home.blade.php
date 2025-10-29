@extends('layouts.app')

@section('title', 'Inicio - Tienda de Videojuegos')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900">
    
    <!-- 🎮 Hero Section Espectacular con Animaciones -->
    <div class="relative overflow-hidden">
        <!-- Fondo animado con partículas -->
        <div class="absolute inset-0 bg-gradient-to-r from-purple-900/20 via-blue-900/20 to-cyan-900/20">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <!-- Texto Hero con efectos -->
            <div class="hero-content">
                <div class="inline-block mb-6">
                    <span class="px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold rounded-full text-sm tracking-wider shadow-lg animate-pulse">
                        ⚡ NUEVOS LANZAMIENTOS
                    </span>
                </div>
                
                <h1 class="text-6xl md:text-7xl lg:text-8xl font-black mb-6 leading-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 animate-gradient">
                        TU GAMING
                    </span>
                    <br>
                    <span class="text-white drop-shadow-2xl">
                        EMPIEZA AQUÍ
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Descubre los mejores videojuegos clásicos y modernos con 
                    <span class="text-yellow-400 font-bold">precios increíbles</span> 
                   
                </p>

                <!-- CTAs con efecto glass -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#productos" class="group relative px-8 py-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold rounded-xl overflow-hidden transform hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-yellow-500/50">
                        <span class="relative z-10 flex items-center gap-2">
                            🎮 Explorar Catálogo
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </a>

                </div>
            </div>

            <!-- Stats animados -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-20 max-w-4xl mx-auto">
                <div class="stat-card bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:border-yellow-400/50 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="text-4xl font-black text-yellow-400 mb-2">500+</div>
                    <div class="text-gray-300 text-sm font-medium">Juegos</div>
                </div>
                <div class="stat-card bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:border-yellow-400/50 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="text-4xl font-black text-yellow-400 mb-2">50K+</div>
                    <div class="text-gray-300 text-sm font-medium">Gamers</div>
                </div>
                <div class="stat-card bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:border-yellow-400/50 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="text-4xl font-black text-yellow-400 mb-2">4.9★</div>
                    <div class="text-gray-300 text-sm font-medium">Rating</div>
                </div>
                <div class="stat-card bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10 hover:border-yellow-400/50 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="text-4xl font-black text-yellow-400 mb-2">24/7</div>
                    <div class="text-gray-300 text-sm font-medium">Soporte</div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🎯 Carrusel Espectacular Mejorado -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16" id="carousel-section">
        <div class="text-center mb-12">
            <h2 class="text-5xl font-black mb-4">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-orange-500">
                    🎮 DESTACADOS
                </span>
            </h2>
            <p class="text-gray-400 text-lg">Los juegos más populares del momento</p>
        </div>

        <!-- Carrusel con efecto 3D -->
        <div class="relative carousel-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($productos->where('imagen', '!=', null) as $producto)
                        <div class="swiper-slide">
                            <a href="{{ route('productos.show-public', $producto) }}" class="block group">
                                <div class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-all duration-500 group-hover:scale-105">
                                    <!-- Imagen -->
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" 
                                        alt="{{ $producto->nombre }}" 
                                        class="w-full h-96 object-cover">
                                    
                                    <!-- Overlay con gradiente -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                                    
                                    <!-- Contenido --
                                    <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                        <h3 class="text-2xl font-bold text-white mb-2 line-clamp-2">{{ $producto->nombre }}</h3>
                                        <div class="flex items-center justify-between">
                                            <span class="text-4xl font-black bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-purple-400 to-cyan-400 animate-pulse drop-shadow-lg mt-6">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                                            <span class="px-4 py-2 bg-yellow-400 text-black font-bold rounded-full text-sm transform group-hover:scale-110 transition-transform">
                                                Ver más →
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Badge de nuevo -->
                                    @if($producto->created_at->diffInDays(now()) < 30)
                                        <div class="absolute top-4 right-4 px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full shadow-lg animate-pulse">
                                            NUEVO
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                
                <!-- Paginación mejorada -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Navegación personalizada -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- 🔍 Búsqueda y Filtros Modernos -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" id="productos">
        <div class="relative bg-gradient-to-r from-slate-900/90 via-blue-900/50 to-slate-900/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/10 overflow-hidden">
            <!-- Efecto de brillo -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -skew-x-12 animate-shimmer"></div>
            
            <div class="relative z-10">
                <!-- Título de la sección de filtros -->
                <div class="mb-6 text-center">
                    <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500 mb-2">
                        🔍 Encuentra tu Juego
                    </h3>
                    <p class="text-gray-400 text-sm">Busca por nombre o filtra por categoría</p>
                </div>

                <div class="flex flex-col lg:flex-row gap-6 items-stretch">
                    <!-- Búsqueda con icono mejorada -->
                    <div class="relative flex-1 w-full group">
                        <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none z-10">
                            <svg class="w-6 h-6 text-gray-400 group-focus-within:text-yellow-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               name="search" 
                               id="search" 
                               placeholder="Escribe el nombre del juego que buscas..."
                               class="w-full pl-14 pr-5 py-5 bg-white/10 backdrop-blur-md border-2 border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:bg-white/20 focus:shadow-lg focus:shadow-yellow-400/20 transition-all duration-300 text-lg font-medium">
                        <!-- Indicador de búsqueda activa -->
                        <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                            <div class="hidden group-focus-within:block">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Filtro de categorías mejorado -->
                    <form method="GET" action="{{ route('home') }}" class="flex items-center gap-4 w-full lg:w-auto">
                        <div class="relative flex-1 lg:flex-initial w-full lg:w-80 group">
                            <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none z-10">
                                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <select name="categoria" 
                                    id="categoria" 
                                    class="w-full pl-14 pr-12 py-5 bg-white/10 backdrop-blur-md border-2 border-white/20 rounded-2xl text-white focus:outline-none focus:border-yellow-400 focus:bg-white/20 focus:shadow-lg focus:shadow-yellow-400/20 transition-all duration-300 text-lg font-medium appearance-none cursor-pointer">
                                <option value="">🎮 Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}" 
                                            {{ request('categoria') == $categoria->id_categoria ? 'selected' : '' }}
                                            class="bg-slate-900">
                                        {{ $categoria->nombre_categoria }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-yellow-400 group-focus-within:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <button type="submit" class="px-8 py-5 bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-black font-bold rounded-2xl hover:from-yellow-500 hover:via-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 hover:-translate-y-1 shadow-xl hover:shadow-2xl hover:shadow-orange-500/50 whitespace-nowrap flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Buscar
                        </button>
                    </form>
                </div>

                <!-- Contador de resultados -->
                <div class="mt-4 text-center">
                    <p class="text-gray-400 text-sm">
                        <span class="text-yellow-400 font-bold">{{ $productos->total() }}</span> juegos disponibles
                    </p>
                </div>


            </div>
        </div>

        <!-- 🕹️ Grid de Productos -->
        <div class="mt-16">
            <div class="flex items-center justify-center mb-8">
                <h2 class="text-4xl font-black text-center">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-orange-500">
                        Catálogo Completo
                    </span>
                </h2>
            </div>

                        <div id="product-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @include('partials.product_list', ['productos' => $productos])
            </div>

            <!-- Paginación mejorada -->
            <div id="pagination-links" class="mt-16 flex justify-center">
                {{ $productos->links() }}
            </div>
        </div>
    </div>

    <!-- 🎨 Estilos personalizados y animaciones -->
    <style>
        /* Animación de gradiente */
        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }

        /* Animación de shimmer */
        @keyframes shimmer {
            0% { transform: translateX(-100%) skewX(-12deg); }
            100% { transform: translateX(200%) skewX(-12deg); }
        }

        .animate-shimmer {
            animation: shimmer 3s infinite;
        }

        /* Swiper personalizado */
        .swiper {
            padding: 20px 60px 60px !important;
        }

        .swiper-slide {
            opacity: 0.4;
            transform: scale(0.85);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .swiper-slide-active {
            opacity: 1;
            transform: scale(1);
            z-index: 10;
        }

        .swiper-slide-next,
        .swiper-slide-prev {
            opacity: 0.7;
            transform: scale(0.92);
        }

        /* Botones de navegación modernos */
        .swiper-button-next,
        .swiper-button-prev {
            width: 60px !important;
            height: 60px !important;
            background: linear-gradient(135deg, #fbbf24, #f97316) !important;
            border-radius: 50% !important;
            box-shadow: 0 10px 30px rgba(251, 191, 36, 0.4) !important;
            transition: all 0.3s ease !important;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 24px !important;
            font-weight: bold !important;
            color: #000 !important;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            transform: scale(1.1) !important;
            box-shadow: 0 15px 40px rgba(251, 191, 36, 0.6) !important;
        }

        /* Paginación espectacular */
        .swiper-pagination {
            bottom: 20px !important;
        }

        .swiper-pagination-bullet {
            width: 12px !important;
            height: 12px !important;
            background: rgba(255, 255, 255, 0.3) !important;
            opacity: 1 !important;
            margin: 0 8px !important;
            transition: all 0.3s ease !important;
        }

        .swiper-pagination-bullet-active {
            width: 40px !important;
            border-radius: 6px !important;
            background: linear-gradient(90deg, #fbbf24, #f97316) !important;
            box-shadow: 0 0 20px rgba(251, 191, 36, 0.8) !important;
        }

        /* Efectos hover en stats */
        .stat-card {
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(251, 191, 36, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        /* Animación entrada hero */
        .hero-content {
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive mejorado */
        @media (max-width: 768px) {
            .swiper {
                padding: 10px 40px 50px !important;
            }
            
            .swiper-button-next,
            .swiper-button-prev {
                width: 45px !important;
                height: 45px !important;
            }

            .swiper-button-next::after,
            .swiper-button-prev::after {
                font-size: 18px !important;
            }
        }

        /* Scroll suave */
        html {
            scroll-behavior: smooth;
        }

        /* Dark mode select options */
        select option {
            background-color: #0f172a;
            color: white;
        }
    </style>
</div>
@endsection

@push('scripts')
@if(session('success'))
<script>
Swal.fire({
    title: "¡Producto agregado!",
    text: "{{ session('success') }}",
    icon: "success",
    timer: 2500,
    showConfirmButton: false,
    background: '#1e293b',
    color: '#fff',
    iconColor: '#fbbf24',
    customClass: {
        popup: 'rounded-2xl shadow-2xl border border-yellow-400/20'
    }
});
</script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    // 🌀 Inicializar Swiper con efectos 3D
    const swiper = new Swiper('.mySwiper', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        loop: true,
        coverflowEffect: {
            rotate: 20,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            320: { 
                slidesPerView: 1,
                coverflowEffect: {
                    rotate: 10,
                    depth: 100,
                }
            },
            640: { 
                slidesPerView: 2,
                coverflowEffect: {
                    rotate: 15,
                    depth: 150,
                }
            },
            1024: { 
                slidesPerView: 3,
                coverflowEffect: {
                    rotate: 20,
                    depth: 200,
                }
            }
        }
    });

    // Búsqueda en tiempo real mejorada
    const searchInput = document.getElementById('search');
    let searchTimeout;

    searchInput?.addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        const value = e.target.value;

        searchTimeout = setTimeout(() => {
            if (value.length >= 2 || value.length === 0) {
                performSearch(value);
            }
        }, 500);
    });

    function performSearch(query) {
        const url = new URL(window.location.href);
        if (query) {
            url.searchParams.set('search', query);
        } else {
            url.searchParams.delete('search');
        }
        
        fetch(url)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newProductList = doc.getElementById('product-list');
                const newPagination = doc.getElementById('pagination-links');
                
                if (newProductList) {
                    document.getElementById('product-list').innerHTML = newProductList.innerHTML;
                }
                if (newPagination) {
                    document.getElementById('pagination-links').innerHTML = newPagination.innerHTML;
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Auto-submit del formulario de categorías
    document.getElementById('categoria')?.addEventListener('change', function() {
        this.closest('form').submit();
    });

    // Animación de entrada para las stats
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.stat-card').forEach(card => {
        observer.observe(card);
    });
});
</script>
@endpush