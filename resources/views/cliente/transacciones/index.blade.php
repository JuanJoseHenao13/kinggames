@extends('layouts.cliente')

@section('page-title', 'Mis Compras')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-900 dark:text-dorado">Mis Compras</h1>
            <p class="text-gray-700 dark:text-blanco/70 mt-2">Historial de todas tus compras</p>
        </div>
    </div>

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl border-2 border-azul-rey/30">
        <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 to-transparent">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado">Lista de Compras</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200/50 dark:divide-gray-700/50">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
                        <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-4 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white/50 dark:bg-gris-oscuro/50 divide-y divide-gray-200/30 dark:divide-gray-700/30">
                    @forelse($transacciones as $transaccion)
                        <tr class="hover:bg-azul-rey/5 dark:hover:bg-gray-700/30 transition-colors duration-200">
                            <td class="px-4 py-6 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $transaccion->id_transaccion }}</td>
                            <td class="px-4 py-6 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $transaccion->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-6 whitespace-nowrap text-sm font-bold text-dorado dark:text-dorado">${{ number_format($transaccion->total, 2) }}</td>
                            <td class="px-4 py-6 text-sm font-medium">
                                <a href="{{ route('cliente.transacciones.show', $transaccion) }}" class="group/btn bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                                    Ver Detalle
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center space-y-4">
                                    <span class="text-6xl">🧾</span>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No has realizado ninguna compra</h3>
                                        <p class="text-gray-500 dark:text-gray-400">¡Explora nuestros productos y haz tu primera compra!</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
