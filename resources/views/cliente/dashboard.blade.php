@extends('layouts.cliente')

@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Header con efecto gaming -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-gray-900 via-purple-900 to-violet-900 dark:from-gray-950 dark:via-purple-950 dark:to-violet-950 p-6 md:p-8 border border-purple-500/20 shadow-2xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnpNNiAzNmMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnoiIHN0cm9rZT0iIzgwMDBmZiIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-30"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                <span class="text-green-400 text-sm font-semibold tracking-wider uppercase">Online</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-400 to-cyan-400 mb-2">
                Bienvenido, {{ auth()->user()->nombre }}
            </h1>
            <p class="text-gray-300 dark:text-gray-400 text-base md:text-lg">¿Listo para tu próxima aventura gaming?</p>
        </div>
        <!-- Decoración de esquina -->
        <div class="absolute top-0 right-0 w-48 h-48 bg-purple-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-cyan-500 rounded-full blur-3xl opacity-20"></div>
    </div>

    <!-- Grid de cards gaming - Más compacto -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
        <!-- Card Productos -->
        <a href="{{ route('cliente.productos.index') }}" class="group relative overflow-hidden transform bg-gradient-to-br from-blue-600 to-cyan-600 dark:from-blue-700 dark:to-cyan-800 rounded-xl shadow-lg hover:shadow-cyan-500/50 transition-all duration-300 hover:scale-105 hover:-rotate-1">
            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
            <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0yMCAwdjQwTTAgMjBoNDAiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIuNSIvPjwvZz48L3N2Zz4=')]"></div>
            
            <div class="relative z-10 p-6 flex flex-col items-center justify-center text-center h-[180px]">
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-3 mb-3 group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">
                    <i class="bi bi-controller text-white text-4xl"></i>
                </div>
                <h2 class="text-xl font-black text-white mb-1 group-hover:tracking-wider transition-all duration-300">Productos</h2>
                <p class="text-blue-100 dark:text-blue-200 text-sm font-medium mb-2">Explora videojuegos</p>
                <div class="flex items-center gap-1 text-white/80 group-hover:text-white transition-colors">
                    <span class="text-xs font-bold">EXPLORAR</span>
                    <i class="bi bi-arrow-right-circle-fill text-sm group-hover:translate-x-1 transition-transform duration-300"></i>
                </div>
            </div>
            
            <!-- Borde animado -->
            <div class="absolute inset-0 rounded-xl border-2 border-cyan-400/50 group-hover:border-cyan-300 transition-colors duration-300"></div>
        </a>

<!-- Card Carrito -->
<a href="{{ route('cliente.cart.index') }}" class="group relative overflow-hidden transform bg-gradient-to-br from-emerald-600 via-green-600 to-emerald-700 dark:from-emerald-800 dark:via-green-900 dark:to-emerald-950 rounded-xl shadow-lg hover:shadow-emerald-400/60 transition-all duration-300 hover:scale-105 hover:rotate-1">

    <!-- Capa de brillo -->
    <div class="absolute inset-0 bg-white/5 group-hover:bg-white/10 transition-colors duration-300"></div>

    <!-- Patrón de fondo -->
    <div class="absolute inset-0 opacity-25 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBzdHJva2U9IndoaXRlIiBzdHJva2Utb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMCAwaDQwdjQwSDB6Ii8+PHBhdGggZD0iTTAgMjBIMzAiLz48cGF0aCBkPSJNMTAgMEwxMCAzMCIvPjwvZz48L3N2Zz4=')] bg-center bg-[length:40px_40px]"></div>

    <!-- Contenido -->
    <div class="relative z-10 p-6 flex flex-col items-center justify-center text-center h-[180px]">
        <div class="flex flex-col items-center justify-center h-full">
            <div class="bg-white/30 backdrop-blur-sm rounded-xl p-3 mb-3 group-hover:scale-110 group-hover:-rotate-12 transition-transform duration-300">
                <i class="bi bi-cart-fill text-white text-4xl"></i>
            </div>
            <h2 class="text-xl font-black text-white mb-1 group-hover:tracking-wider transition-all duration-300">
                Mi Carrito
            </h2>
            <p class="text-emerald-100 dark:text-emerald-200 text-sm font-medium mb-2">
                Revisa tus productos
            </p>
            <div class="flex items-center gap-1 text-white/90 group-hover:text-white transition-colors">
                <span class="text-xs font-bold">VER CARRITO</span>
                <i class="bi bi-arrow-right-circle-fill text-sm group-hover:translate-x-1 transition-transform duration-300"></i>
            </div>
        </div>
    </div>

    <!-- Borde animado -->
    <div class="absolute inset-0 rounded-xl border-2 border-emerald-400/50 group-hover:border-emerald-300 transition-colors duration-300"></div>
</a>

        <!-- Card Compras -->
        <a href="{{ route('cliente.transacciones.index') }}" class="group relative overflow-hidden transform bg-gradient-to-br from-amber-600 to-orange-600 dark:from-amber-700 dark:to-orange-800 rounded-xl shadow-lg hover:shadow-orange-500/50 transition-all duration-300 hover:scale-105 hover:-rotate-1">
            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
            <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0yMCAwdjQwTTAgMjBoNDAiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIuNSIvPjwvZz48L3N2Zz4=')]"></div>
            
            <div class="relative z-10 p-6 flex flex-col items-center justify-center text-center h-[180px]">
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-3 mb-3 group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">
                    <i class="bi bi-receipt text-white text-4xl"></i>
                </div>
                <h2 class="text-xl font-black text-white mb-1 group-hover:tracking-wider transition-all duration-300">Mis Compras</h2>
                <p class="text-amber-100 dark:text-amber-200 text-sm font-medium mb-2">Historial de compras</p>
                <div class="flex items-center gap-1 text-white/80 group-hover:text-white transition-colors">
                    <span class="text-xs font-bold">VER HISTORIAL</span>
                    <i class="bi bi-arrow-right-circle-fill text-sm group-hover:translate-x-1 transition-transform duration-300"></i>
                </div>
            </div>
            
            <div class="absolute inset-0 rounded-xl border-2 border-orange-400/50 group-hover:border-orange-300 transition-colors duration-300"></div>
        </a>

        <!-- Card Perfil -->
        <a href="{{ route('cliente.perfil') }}" class="group relative overflow-hidden transform bg-gradient-to-br from-purple-600 to-pink-600 dark:from-purple-700 dark:to-pink-800 rounded-xl shadow-lg hover:shadow-pink-500/50 transition-all duration-300 hover:scale-105 hover:rotate-1">
            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
            <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0yMCAwdjQwTTAgMjBoNDAiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIuNSIvPjwvZz48L3N2Zz4=')]"></div>
            
            <div class="relative z-10 p-6 flex flex-col items-center justify-center text-center h-[180px]">
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-3 mb-3 group-hover:scale-110 group-hover:-rotate-12 transition-transform duration-300">
                    <i class="bi bi-person-circle text-white text-4xl"></i>
                </div>
                <h2 class="text-xl font-black text-white mb-1 group-hover:tracking-wider transition-all duration-300">Mi Perfil</h2>
                <p class="text-purple-100 dark:text-purple-200 text-sm font-medium mb-2">Información personal</p>
                <div class="flex items-center gap-1 text-white/80 group-hover:text-white transition-colors">
                    <span class="text-xs font-bold">CONFIGURAR</span>
                    <i class="bi bi-arrow-right-circle-fill text-sm group-hover:translate-x-1 transition-transform duration-300"></i>
                </div>
            </div>
            
            <div class="absolute inset-0 rounded-xl border-2 border-pink-400/50 group-hover:border-pink-300 transition-colors duration-300"></div>
        </a>
    </div>
</div>
@endsection