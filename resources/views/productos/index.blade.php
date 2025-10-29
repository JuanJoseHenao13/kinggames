@extends('layouts.app')

@section('title', 'Productos - Tienda de Videojuegos')

@section('content')

<!-- Neon Gaming Background -->
<div class="min-h-screen bg-gradient-to-br from-slate-950 via-purple-950 to-slate-900 relative overflow-hidden">
    <!-- Animated Neon Grid Background -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMCwxMjgsMC4xKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-30"></div>

    <!-- Floating Neon Orbs -->
    <div class="absolute top-20 left-10 w-32 h-32 bg-pink-500/20 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute top-40 right-20 w-24 h-24 bg-cyan-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
    <div class="absolute bottom-32 left-1/4 w-40 h-40 bg-purple-500/15 rounded-full blur-xl animate-pulse delay-500"></div>
    <div class="absolute bottom-20 right-10 w-28 h-28 bg-green-400/20 rounded-full blur-xl animate-pulse delay-1500"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Neon Header -->
        <div class="text-center mb-16">
            <div class="mb-6">
                <span class="inline-block px-6 py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-cyan-400 text-black font-black text-lg tracking-wider rounded-full shadow-2xl animate-pulse border-2 border-pink-400/50">
                    🎮 Bienvenidos a nuestros productos
                </span>
            </div>

            <h1 class="text-6xl md:text-7xl font-black mb-6 leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-purple-400 to-cyan-400 animate-gradient drop-shadow-2xl">
                    NUESTROS
                </span>
                <br>
                <span class="text-white drop-shadow-2xl text-5xl md:text-6xl">
                    PRODUCTOS
                </span>
            </h1>

            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                Descubre la mejor colección de videojuegos con
                <span class="text-pink-400 font-bold">estilos neon</span> y
                <span class="text-cyan-400 font-bold">efectos futuristas</span>
                <i class="bi bi-lightning-charge-fill text-yellow-400 ml-2 text-2xl"></i>
            </p>
        </div>

        <!-- Neon Filter Panel -->
        <div class="mb-12 flex justify-center">
            <div class="bg-black/40 backdrop-blur-xl rounded-3xl p-8 border-2 border-pink-500/30 shadow-2xl relative overflow-hidden">
                <!-- Neon glow effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-pink-500/10 via-purple-500/10 to-cyan-400/10 rounded-3xl"></div>

                <form method="GET" action="{{ route('productos.index') }}" id="filter-form" class="relative flex flex-wrap items-center justify-center gap-6">
                    <!-- Search Input -->
                    <div class="group">
                        <div class="relative">
                            <i class="bi bi-search absolute left-4 top-1/2 transform -translate-y-1/2 text-pink-400 text-lg"></i>
                            <input type="text" name="search" id="search" placeholder="🔍 Buscar juegos..." value="{{ request('search') }}"
                                class="pl-12 pr-6 py-4 w-80 rounded-2xl border-2 border-pink-500/50 bg-black/60 text-white placeholder-pink-300
                                       focus:ring-4 focus:ring-pink-400/50 focus:border-pink-400 focus:bg-black/80
                                       transition-all duration-300 hover:border-pink-400/70 hover:shadow-lg hover:shadow-pink-400/20
                                       text-lg font-medium backdrop-blur-sm">
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="group">
                        <div class="relative">
                            <i class="bi bi-tags-fill absolute left-4 top-1/2 transform -translate-y-1/2 text-purple-400 text-lg"></i>
                            <select name="categoria" id="categoria"
                                class="pl-12 pr-6 py-4 w-64 rounded-2xl border-2 border-purple-500/50 bg-black/60 text-white
                                       focus:ring-4 focus:ring-purple-400/50 focus:border-purple-400 focus:bg-black/80
                                       transition-all duration-300 hover:border-purple-400/70 hover:shadow-lg hover:shadow-purple-400/20
                                       text-lg font-medium backdrop-blur-sm appearance-none">
                                <option value="" class="bg-slate-900 text-white">🎯 Todas las categorías</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id_categoria }}" {{ request('categoria') == $categoria->id_categoria ? 'selected' : '' }} class="bg-slate-900 text-white">
                                        {{ $categoria->nombre_categoria }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="bi bi-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-purple-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Provider Filter -->
                    <div class="group">
                        <div class="relative">
                            <i class="bi bi-building absolute left-4 top-1/2 transform -translate-y-1/2 text-cyan-400 text-lg"></i>
                            <select name="proveedor" id="proveedor"
                                class="pl-12 pr-6 py-4 w-64 rounded-2xl border-2 border-cyan-500/50 bg-black/60 text-white
                                       focus:ring-4 focus:ring-cyan-400/50 focus:border-cyan-400 focus:bg-black/80
                                       transition-all duration-300 hover:border-cyan-400/70 hover:shadow-lg hover:shadow-cyan-400/20
                                       text-lg font-medium backdrop-blur-sm appearance-none">
                                <option value="" class="bg-slate-900 text-white">🏢 Todos los proveedores</option>
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id_proveedor }}" {{ request('proveedor') == $proveedor->id_proveedor ? 'selected' : '' }} class="bg-slate-900 text-white">
                                        {{ $proveedor->nombre_proveedor }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="bi bi-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-cyan-400 pointer-events-none"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Grid Container -->
        <div id="product-list" class="relative">
            @include('productos.partials.lista')
        </div>
    </div>
</div>

<style>
    /* Custom Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin: 2rem 0;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 0.5rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .pagination li {
        list-style: none;
    }

    .pagination li a,
    .pagination li span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 2.5rem;
        height: 2.5rem;
        padding: 0.5rem 0.75rem;
        margin: 0 0.125rem;
        border-radius: 0.375rem;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        background: rgba(255, 255, 255, 0.1);
        color: #e5e7eb;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .pagination li a:hover {
        background: rgba(0, 255, 136, 0.2);
        color: #00ff88;
        border-color: #00ff88;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 255, 136, 0.3);
    }

    .pagination .active span {
        background: linear-gradient(45deg, #00ff88, #0080ff);
        color: #000;
        border-color: #00ff88;
        box-shadow: 0 0 15px rgba(0, 255, 136, 0.5);
    }

    .pagination .disabled span {
        background: rgba(255, 255, 255, 0.05);
        color: #6b7280;
        cursor: not-allowed;
        opacity: 0.5;
    }

    /* Ensure pagination is always visible */
    .pagination {
        position: relative;
        z-index: 10;
        min-height: 3rem;
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .pagination {
            flex-wrap: wrap;
            gap: 0.25rem;
        }

        .pagination li a,
        .pagination li span {
            min-width: 2rem;
            height: 2rem;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
    }
</style>

@endsection

@section('js')
@if(session('success'))
<script>
  Swal.fire({
    title: "¡Éxito!",
    text: "{{ session('success') }}",
    icon: "success",
    timer: 2000,
    showConfirmButton: false,
    background: '#ffffff',
    color: '#000000'
  });
</script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
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
                body: JSON.stringify({ cantidad: 1 })
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

    const filterForm = document.getElementById('filter-form');
    const searchInput = document.getElementById('search');
    const categorySelect = document.getElementById('categoria');
    const providerSelect = document.getElementById('proveedor');
    const productList = document.getElementById('product-list');

    function fetchProducts() {
        const formData = new FormData(filterForm);
        const params = new URLSearchParams(formData);
        const url = `${filterForm.action}?${params.toString()}`;

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            productList.innerHTML = html;
        })
        .catch(error => console.error('Error fetching products:', error));
    }

    searchInput.addEventListener('input', fetchProducts);
    categorySelect.addEventListener('change', fetchProducts);
    providerSelect.addEventListener('change', fetchProducts);
});
</script>
@endsection