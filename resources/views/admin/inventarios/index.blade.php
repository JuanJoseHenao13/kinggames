@extends('layouts.admin')

@section('page-title', 'Gestión de Inventario')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Gestión de Inventario</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Administra las cantidades de productos por proveedor</p>
        </div>
    </div>

    <!-- Buscador de Proveedores -->
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30 mb-6">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-6">Buscar Proveedor</h2>
            <input type="text" id="search-proveedores" placeholder="Buscar proveedores..." class="w-full max-w-md px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white" list="proveedores-datalist">
            <datalist id="proveedores-datalist">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->nombre }}" data-id="{{ $proveedor->id_proveedor }}">
                @endforeach
            </datalist>
            <button id="select-proveedor-btn" class="mt-4 px-6 py-3 bg-gradient-to-r from-azul-rey to-blue-500 text-white font-bold rounded-xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                <span class="flex items-center space-x-2">
                    <span>🔍</span>
                    <span>Seleccionar Proveedor</span>
                </span>
            </button>
        </div>
    </div>

    <!-- Selector de Proveedor -->
    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-6">Seleccionar Proveedor</h2>
            <form method="GET" action="{{ route('inventarios.index') }}" class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <select name="proveedor_id" id="proveedor_id" class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white focus:ring-2 focus:ring-azul-rey focus:border-transparent transition-all duration-300">
                        <option value="" class="text-gray-500 bg-white dark:bg-gris-oscuro dark:text-gray-300">Selecciona un proveedor</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedor }}" class="text-gray-900 dark:text-white bg-white dark:bg-gris-oscuro" {{ request('proveedor_id') == $proveedor->id_proveedor ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-azul-rey to-blue-500 text-white font-bold rounded-xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                    <span class="flex items-center space-x-2">
                        <span>🔍</span>
                        <span>Buscar Productos</span>
                    </span>
                </button>
            </form>
        </div>
    </div>

    @if(request('proveedor_id'))
        <!-- Lista de Productos del Proveedor -->
        <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30">
            <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 to-transparent">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">
                    Productos de {{ $proveedores->where('id_proveedor', request('proveedor_id'))->first()->nombre ?? 'Proveedor' }}
                </h2>
                <div class="mt-4">
                    <input type="text" id="search-productos" placeholder="Buscar productos..." class="w-full max-w-md px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200/50 dark:divide-gray-700/50">
                    <thead class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-700">
                        <tr>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Imagen</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Precio</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Stock Actual</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Stock Mínimo</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                            <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="productos-table-body" class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
                        @forelse($productos as $producto)
                            <tr class="hover:bg-azul-rey/5 dark:hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-8 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $producto->id_producto }}</td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden shadow-lg ring-2 ring-azul-rey/20">
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $producto->nombre }}</td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm font-bold text-dorado dark:text-dorado">${{ number_format($producto->precio, 2) }}</td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    @if($producto->inventario)
                                        <span class="font-semibold">{{ $producto->inventario->stock }}</span>
                                    @else
                                        <span class="text-red-500">Sin inventario</span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    @if($producto->inventario)
                                        <span class="font-semibold">{{ $producto->inventario->stock_minimo }}</span>
                                    @else
                                        <span class="text-red-500">Sin inventario</span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    @if($producto->inventario)
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full {{ $producto->inventario->stock > $producto->inventario->stock_minimo ? 'bg-gradient-to-r from-green-400 to-green-500 text-white shadow-lg' : 'bg-gradient-to-r from-red-400 to-red-500 text-white shadow-lg' }}">
                                            {{ $producto->inventario->stock > $producto->inventario->stock_minimo ? 'En Stock' : 'Bajo Stock' }}
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-gradient-to-r from-gray-400 to-gray-500 text-white shadow-lg">
                                            Sin Inventario
                                        </span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                                    @if($producto->inventario)
                                        <div class="flex space-x-2">
                                            <a href="{{ route('inventarios.edit', $producto->inventario->id_inventario) }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95 inline-block">
                                                <span class="text-xs">✏️</span>
                                            </a>
                                            <button onclick="deleteInventario({{ $producto->inventario->id_inventario }})" class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                                <span class="text-xs">🗑️</span>
                                            </button>
                                        </div>
                                    @else
                                        <a href="{{ route('inventarios.create.with.product', $producto->id_producto) }}" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-3 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95 inline-block">
                                            <span class="text-xs">➕</span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-8 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <span class="text-6xl">📦</span>
                                        <div>
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No hay productos para este proveedor</h3>
                                            <p class="text-gray-500 dark:text-gray-400">Selecciona otro proveedor o crea productos para este proveedor.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<script>
document.getElementById('search-productos')?.addEventListener('input', function() {
    const searchTerm = this.value;
    const tableBody = document.getElementById('productos-table-body');

    if (searchTerm.length > 0) {
        fetch(`{{ route('inventarios.index') }}?proveedor_id={{ request('proveedor_id') }}&search=${encodeURIComponent(searchTerm)}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            },
        })
        .then(response => response.text())
        .then(html => {
            tableBody.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        // Reload the page to show all productos
        location.reload();
    }
});

document.getElementById('select-proveedor-btn')?.addEventListener('click', function() {
    const searchInput = document.getElementById('search-proveedores');
    const selectedValue = searchInput.value;
    const datalist = document.getElementById('proveedores-datalist');
    const options = datalist.querySelectorAll('option');

    let selectedId = null;
    options.forEach(option => {
        if (option.value === selectedValue) {
            selectedId = option.getAttribute('data-id');
        }
    });

    if (selectedId) {
        const select = document.getElementById('proveedor_id');
        select.value = selectedId;
        select.form.submit();
    } else {
        alert('Por favor selecciona un proveedor válido de la lista.');
    }
});
</script>

@endsection

@section('js')
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#FFD700',
            confirmButtonText: 'Aceptar'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Aceptar'
        });
    @endif

    function deleteInventario(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/inventarios/${id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
