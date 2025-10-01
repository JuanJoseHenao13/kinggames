@extends('layouts.admin')

@section('page-title', 'Gestión de Productos')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-dorado">Productos</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Gestiona todos los productos de tu tienda</p>
        </div>
        <a href="{{ route('productos.create') }}" class="group bg-gradient-to-r from-dorado to-yellow-400 text-black font-bold py-4 px-6 rounded-2xl hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
            <span class="flex items-center space-x-2">
                <span class="text-xl">➕</span>
                <span>Crear Nuevo Producto</span>
            </span>
        </a>
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

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl border-2 border-azul-rey/30">
        <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 to-transparent">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado">Lista de Productos</h2>
        </div>
        <div id="product-list">
            @include('admin.productos.partials.lista')
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // Handle delete form confirmations with SweetAlert2
    document.addEventListener('DOMContentLoaded', function() {
        const setupDeleteForms = () => {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Esta acción no se puede deshacer. El producto será eliminado permanentemente.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar',
                        background: '#ffffff',
                        color: '#000000',
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl',
                            confirmButton: 'px-6 py-3 rounded-xl font-bold',
                            cancelButton: 'px-6 py-3 rounded-xl font-bold'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading state
                            Swal.fire({
                                title: 'Eliminando...',
                                text: 'Por favor espera mientras se elimina el producto.',
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                }
                            });

                            // Submit the form
                            form.submit();
                        }
                    });
                });
            });
        }

        setupDeleteForms();

        // Handle success messages
        @if(session('success'))
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session("success") }}',
                icon: 'success',
                confirmButtonColor: '#10b981',
                background: '#ffffff',
                color: '#000000',
                customClass: {
                    popup: 'rounded-2xl shadow-2xl',
                    confirmButton: 'px-6 py-3 rounded-xl font-bold'
                }
            });
        @endif

        // Handle error messages
        @if(session('error') || $errors->any())
            Swal.fire({
                title: 'Error',
                text: '{{ session("error") ?: $errors->first() }}',
                icon: 'error',
                confirmButtonColor: '#ef4444',
                background: '#ffffff',
                color: '#000000',
                customClass: {
                    popup: 'rounded-2xl shadow-2xl',
                    confirmButton: 'px-6 py-3 rounded-xl font-bold'
                }
            });
        @endif

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
                setupDeleteForms(); // Re-attach event listeners to new delete forms
            })
            .catch(error => console.error('Error fetching products:', error));
        }

        searchInput.addEventListener('input', fetchProducts);
        categorySelect.addEventListener('change', fetchProducts);
        providerSelect.addEventListener('change', fetchProducts);
    });
</script>
@endsection