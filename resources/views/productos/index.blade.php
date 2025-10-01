@extends('layouts.app')

@section('title', 'Productos - Tienda de Videojuegos')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-black dark:text-dorado">Nuestros Productos</h1>
</div>

<div class="mb-8 flex justify-center">
    <form method="GET" action="{{ route('productos.index') }}" id="filter-form" class="flex flex-wrap items-center justify-center space-x-4 space-y-2">
        <!-- Search Input -->
        <div class="w-full md:w-auto">
            <input type="text" name="search" id="search" placeholder="Buscar producto..." value="{{ request('search') }}"
                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-black dark:text-white focus:ring-2 focus:ring-dorado">
        </div>

        <!-- Category Filter -->
        <div class="w-full md:w-auto">
            <label for="categoria" class="sr-only">Filtrar por categoría:</label>
            <select name="categoria" id="categoria" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-black dark:text-white focus:ring-2 focus:ring-dorado">
                <option value="">Todas las categorías</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" {{ request('categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Provider Filter -->
        <div class="w-full md:w-auto">
            <label for="proveedor" class="sr-only">Filtrar por proveedor:</label>
            <select name="proveedor" id="proveedor" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-black dark:text-white focus:ring-2 focus:ring-dorado">
                <option value="">Todos los proveedores</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedor }}" {{ request('proveedor') == $proveedor->id_proveedor ? 'selected' : '' }}>
                        {{ $proveedor->nombre_proveedor }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
</div>

<div id="product-list">
    @include('productos.partials.lista')
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