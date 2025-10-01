@extends('layouts.cliente')

@section('page-title', 'Productos')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-black dark:text-dorado">Nuestros Productos</h1>
</div>

<div class="mb-8 flex justify-center">
    <form method="GET" action="{{ route('cliente.productos.index') }}" id="filter-form" class="flex flex-wrap items-center justify-center space-x-4 space-y-2">
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
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
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
