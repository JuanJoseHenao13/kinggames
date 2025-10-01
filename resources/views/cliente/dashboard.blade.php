@extends('layouts.cliente')

@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-dorado">Bienvenido, {{ auth()->user()->nombre }}</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Este es tu panel de cliente.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <a href="{{ route('cliente.productos.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 p-6 flex flex-col items-center justify-center text-center">
            <i class="bi bi-controller text-blue-600 dark:text-blue-400 text-5xl mb-4 group-hover:scale-110 transition-transform duration-300"></i>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Ver Productos</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Explora nuestro catálogo de videojuegos.</p>
        </a>

        <a href="{{ route('cliente.cart.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 p-6 flex flex-col items-center justify-center text-center">
            <i class="bi bi-cart-fill text-green-600 dark:text-green-400 text-5xl mb-4 group-hover:scale-110 transition-transform duration-300"></i>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Mi Carrito</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Revisa los productos en tu carrito de compras.</p>
        </a>

        <a href="{{ route('cliente.transacciones.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl dark:hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 p-6 flex flex-col items-center justify-center text-center">
            <i class="bi bi-receipt text-yellow-600 dark:text-yellow-400 text-5xl mb-4 group-hover:scale-110 transition-transform duration-300"></i>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Mis Compras</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Consulta el historial de tus compras.</p>
        </a>
    </div>
</div>
@endsection
