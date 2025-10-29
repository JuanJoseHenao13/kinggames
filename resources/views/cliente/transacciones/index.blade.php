@extends('layouts.cliente')

@section('page-title', 'Mis Compras')

@section('content')
<div class="space-y-8">
    <!-- Header Gaming -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-100 via-cyan-100 to-purple-100 dark:from-gray-900 dark:via-blue-900 dark:to-cyan-900 p-8 border border-cyan-300 dark:border-cyan-500/20 shadow-xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnpNNiAzNmMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnoiIHN0cm9rZT0iIzAwZmZmZiIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-30"></div>
        <div class="relative z-10 flex items-center gap-4">
            <div class="bg-cyan-200 dark:bg-cyan-500/20 backdrop-blur-sm rounded-2xl p-4 border border-cyan-300 dark:border-cyan-400/30">
                <i class="bi bi-receipt-cutoff text-cyan-600 dark:text-cyan-400 text-5xl"></i>
            </div>
            <div>
                <h1 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 dark:from-cyan-400 dark:via-blue-400 dark:to-purple-400">
                    Mis Compras
                </h1>
                <p class="text-gray-700 dark:text-gray-300 text-lg mt-1">Historial completo de tus transacciones</p>
            </div>
        </div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-300 dark:bg-cyan-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-300 dark:bg-blue-500 rounded-full blur-3xl opacity-20"></div>
    </div>

    <!-- Tabla Gaming -->
    <div class="relative overflow-hidden rounded-2xl bg-white dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 border-2 border-cyan-300 dark:border-cyan-500/30 shadow-2xl dark:shadow-cyan-500/20">
        <!-- Header de la tabla -->
        <div class="relative px-8 py-6 bg-gradient-to-r from-cyan-100 to-blue-100 dark:from-cyan-600/20 dark:via-blue-600/20 dark:to-purple-600/20 border-b-2 border-cyan-300 dark:border-cyan-500/30 backdrop-blur-sm">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0yMCAwdjQwTTAgMjBoNDAiIHN0cm9rZT0iIzAwZmZmZiIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-20"></div>
            <div class="relative z-10 flex items-center gap-3">
                <div class="w-1 h-8 bg-gradient-to-b from-cyan-500 to-blue-500 dark:from-cyan-400 dark:to-blue-500 rounded-full"></div>
                <h2 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 dark:from-cyan-400 dark:to-blue-400">
                    Lista de Compras
                </h2>
            </div>
        </div>

        <!-- Contenido de la tabla -->
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gradient-to-r dark:from-gray-800/80 dark:to-gray-700/80 border-b border-gray-200 dark:border-cyan-500/20">
                        <th class="px-6 py-4 text-left">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-cyan-500 dark:bg-cyan-400 rounded-full"></div>
                                <span class="text-xs font-black text-cyan-700 dark:text-cyan-400 uppercase tracking-wider">ID Transacción</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-blue-500 dark:bg-blue-400 rounded-full"></div>
                                <span class="text-xs font-black text-blue-700 dark:text-blue-400 uppercase tracking-wider">Fecha</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-purple-500 dark:bg-purple-400 rounded-full"></div>
                                <span class="text-xs font-black text-purple-700 dark:text-purple-400 uppercase tracking-wider">Total</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-pink-500 dark:bg-pink-400 rounded-full"></div>
                                <span class="text-xs font-black text-pink-700 dark:text-pink-400 uppercase tracking-wider">Acciones</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-transparent">
                    @forelse($transacciones as $transaccion)
                        <tr class="group border-b border-gray-200 dark:border-gray-700/30 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-300">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-blue-900 dark:bg-blue-800 border border-blue-700 dark:border-blue-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <i class="bi bi-hash text-blue-300 dark:text-blue-400 text-lg"></i>
                                    </div>
                                    <span class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors duration-300">
                                        {{ $transaccion->id_transaccion }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-2 text-gray-700 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-white transition-colors duration-300">
                                    <i class="bi bi-calendar-event text-blue-600 dark:text-blue-400"></i>
                                    <span class="text-sm font-medium">{{ $transaccion->created_at->format('d/m/Y') }}</span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $transaccion->created_at->format('H:i') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-400 to-teal-400 dark:from-emerald-500 dark:to-teal-500 border border-emerald-300 dark:border-emerald-400 rounded-lg px-4 py-2 group-hover:scale-105 transition-transform duration-300">
                                    <i class="bi bi-currency-dollar text-white font-bold"></i>
                                    <span class="text-base font-black text-white">
                                        {{ number_format($transaccion->total, 2) }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <a href="{{ route('cliente.transacciones.show', $transaccion) }}" class="group/btn relative inline-flex items-center gap-2 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500 text-white font-bold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/50 active:scale-95 border border-cyan-400/30">
                                    <span class="text-sm uppercase tracking-wide">Ver Detalle</span>
                                    <i class="bi bi-arrow-right-circle-fill group-hover/btn:translate-x-1 transition-transform duration-300"></i>
                                    <div class="absolute inset-0 rounded-xl bg-white/20 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-16">
                                <div class="flex flex-col items-center space-y-6">
                                    <!-- Icono animado -->
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-cyan-300 dark:bg-cyan-500 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                                        <div class="relative bg-gray-100 dark:bg-gradient-to-br dark:from-gray-800 dark:to-gray-700 rounded-3xl p-8 border-2 border-cyan-300 dark:border-cyan-500/30">
                                            <i class="bi bi-cart-x text-7xl text-transparent bg-clip-text bg-gradient-to-br from-cyan-600 to-blue-600 dark:from-cyan-400 dark:to-blue-400"></i>
                                        </div>
                                    </div>
                                    
                                    <!-- Texto -->
                                    <div class="text-center space-y-3">
                                        <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600 dark:from-cyan-400 dark:to-blue-400">
                                            No has realizado ninguna compra
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-400 text-lg max-w-md">
                                            ¡Es hora de comenzar tu colección! Explora nuestros productos y encuentra tu próximo juego favorito
                                        </p>
                                    </div>

                                    <!-- Botón CTA -->
                                    <a href="{{ route('cliente.productos.index') }}" class="group/cta relative inline-flex items-center gap-3 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500 text-white font-black px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-cyan-500/50 active:scale-95 border-2 border-cyan-400/30 mt-4">
                                        <i class="bi bi-controller text-2xl"></i>
                                        <span class="text-lg uppercase tracking-wide">Explorar Productos</span>
                                        <i class="bi bi-arrow-right-circle-fill text-xl group-hover/cta:translate-x-2 transition-transform duration-300"></i>
                                        <div class="absolute inset-0 rounded-xl bg-white/20 opacity-0 group-hover/cta:opacity-100 transition-opacity duration-300"></div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer decorativo -->
        <div class="h-2 bg-gradient-to-r from-cyan-600 via-blue-600 to-purple-600"></div>
    </div>
</div>
@endsection