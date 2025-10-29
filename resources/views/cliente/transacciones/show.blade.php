@extends('layouts.cliente')

@section('page-title', 'Detalle de Compra')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-dorado">Detalle de Compra #{{ $transaccion->id_transaccion }}</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Detalles de tu compra</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('cliente.transacciones.pdf', $transaccion->id_transaccion) }}" class="group bg-gradient-to-r from-red-500 to-red-600 text-white font-bold py-3 px-5 rounded-2xl hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                <span class="flex items-center space-x-2">
                    <span class="text-xl">📄</span>
                    <span>Descargar PDF</span>
                </span>
            </a>
            <a href="{{ route('cliente.transacciones.index') }}" class="group bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold py-3 px-5 rounded-2xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
                <span class="flex items-center space-x-2">
                    <span class="text-xl">⬅️</span>
                    <span>Volver a Mis Compras</span>
                </span>
            </a>
        </div>
    </div>

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl border-2 border-azul-rey/30 p-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-4">Información General</h3>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">ID Compra</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $transaccion->id_transaccion }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Fecha</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $transaccion->fecha_transaccion ? $transaccion->fecha_transaccion->format('d/m/Y H:i:s') : 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Total</dt>
                        <dd class="mt-1 text-2xl font-bold text-dorado dark:text-dorado">${{ number_format($transaccion->total ?? 0, 2) }}</dd>
                    </div>
                </dl>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-4">Información del Cliente</h3>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Nombre</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $transaccion->usuario->nombre ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Email</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $transaccion->usuario->email ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Teléfono</dt>
                        <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $transaccion->usuario->telefono ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-4">Información de Proveedores</h3>
                <dl class="space-y-4">
                    @php
                        $proveedores = $transaccion->detalleTransacciones->map(function($detalle) {
                            return $detalle->producto->proveedor;
                        })->unique('id_proveedor');
                    @endphp
                    @foreach($proveedores as $proveedor)
                        <div class="mb-4 border-b border-gray-300 dark:border-gray-700 pb-2">
                            <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Nombre</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $proveedor->nombre ?? 'N/A' }}</dd>
                            <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Teléfono</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $proveedor->telefono ?? 'N/A' }}</dd>
                            <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">Dirección</dt>
                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $proveedor->direccion ?? 'N/A' }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-dorado mb-4">Productos Comprados</h3>
            <div class="flow-root">
                <ul role="list" class="-my-4 divide-y divide-gray-200/50 dark:divide-gray-700/50">
                    @foreach($transaccion->detalleTransacciones as $detalle)
                        @if($detalle->producto)
                            <li class="flex items-center py-6 space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="h-20 w-20 rounded-lg object-cover shadow-md" src="{{ asset('storage/' . $detalle->producto->imagen) }}" alt="{{ $detalle->producto->nombre }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xl font-medium text-gray-900 dark:text-white">{{ $detalle->producto->nombre }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Proveedor: {{ $detalle->producto->proveedor->nombre ?? 'N/A' }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Categoría: {{ $detalle->producto->categoria ? $detalle->producto->categoria->nombre_categoria : 'N/A' }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Cantidad: {{ $detalle->cantidad }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-semibold text-dorado dark:text-dorado">${{ number_format($detalle->precio_unitario, 2) }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Subtotal: ${{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }}</p>
                                </div>
                            </li>
                        @else
                            <li class="flex items-center py-4 space-x-4 text-red-500">
                                Producto no disponible
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
