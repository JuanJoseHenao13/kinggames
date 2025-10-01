@extends('layouts.app')

@section('title', 'Inicio - Tienda de Videojuegos')

@section('content')
<div class="min-h-screen">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-dorado to-blue-950 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-4 text-black dark:text-white">Bienvenido a nuestra Tienda de Videojuegos</h1>
            <p class="text-xl mb-8 text-black dark:text-white">Descubre los mejores juegos clásicos al mejor precio.</p>
        </div>
    </div>

    <!-- Carousel Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-3xl font-bold mb-8 text-center text-black dark:text-dorado">Galería de Videojuegos</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($productos->where('imagen', '!=', null) as $producto)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-80 object-cover rounded-lg">
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <style>
        .swiper-pagination-bullet-active {
            background-color: #fbbf24;
        }
        .swiper-slide {
            transition: transform 0.3s ease;
        }
        .swiper-slide:hover {
            transform: scale(1.05);
        }
    </style>

    <!-- Search and Filter Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
            <div class="flex flex-col lg:flex-row justify-center items-center space-y-4 lg:space-y-0 lg:space-x-6">
                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4 w-full lg:w-auto">
                    <input type="text" name="search" id="search" placeholder="Buscar productos..."
                           class="w-full sm:w-48 lg:w-64 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-black dark:text-white focus:ring-2 focus:ring-dorado focus:border-transparent">
                    <form method="GET" action="{{ route('home') }}" class="flex items-center space-x-2 w-full sm:w-auto">
                        <label for="categoria" class="mr-2 text-black dark:text-dorado font-medium whitespace-nowrap text-sm lg:text-base">Categoría:</label>
                        <select name="categoria" id="categoria" class="w-full sm:w-48 lg:w-64 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-black dark:text-white focus:ring-2 focus:ring-dorado focus:border-transparent text-sm lg:text-base">
                            <option value="">Todas</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}" {{ request('categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                                    {{ $categoria->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center text-black dark:text-dorado">Nuestros Productos</h2>
            <div id="product-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 mb-8">
                @include('partials.product_list', ['productos' => $productos])
            </div>
            <div id="pagination-links" class="mt-16 flex justify-center">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@if(session('success'))
<script>
  Swal.fire({
    title: "Producto agregado",
    text: "{{ session('success') }}",
    icon: "success",
    timer: 2000,
    showConfirmButton: false
  });
</script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Swiper
    const swiper = new Swiper('.mySwiper', {
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const url = this.action;
            const csrfToken = this.querySelector('input[name="_token"]').value;

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ cantidad: 1 }) // Siempre agregamos 1 desde aquí
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartCount(data.cartCount);
                    Swal.fire({
                        title: "¡Agregado!",
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

    function fetchProducts(url) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('product-list').innerHTML = data.view;
            document.getElementById('pagination-links').innerHTML = data.pagination;
        })
        .catch(error => console.error('Error:', error));
    }

    document.getElementById('search').addEventListener('keyup', function () {
        const search = this.value;
        const categoria = document.getElementById('categoria').value;
        const url = `{{ route('home') }}?search=${search}&categoria=${categoria}`;
        fetchProducts(url);
    });

    document.getElementById('categoria').addEventListener('change', function () {
        const categoria = this.value;
        const search = document.getElementById('search').value;
        const url = `{{ route('home') }}?search=${search}&categoria=${categoria}`;
        fetchProducts(url);
    });

    document.addEventListener('click', function(event) {
        if (event.target.matches('#pagination-links a')) {
            event.preventDefault();
            const url = event.target.href;
            fetchProducts(url);
        }
    });
});
</script>
@endsection
