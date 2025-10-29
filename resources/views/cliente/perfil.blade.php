@extends('layouts.cliente')

@section('page-title', 'Perfil')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Header Gaming -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-100 via-pink-100 to-blue-100 dark:from-gray-900 dark:via-purple-900 dark:to-pink-900 p-8 border border-purple-300 dark:border-purple-500/20 shadow-xl">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnpNNiAzNmMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnoiIHN0cm9rZT0iIzgwMDBmZiIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-20"></div>
        <div class="relative z-10 flex items-center gap-4">
            <div class="bg-purple-200 dark:bg-purple-500/20 backdrop-blur-sm rounded-2xl p-4 border border-purple-300 dark:border-purple-400/30">
                <i class="bi bi-person-circle text-purple-600 dark:text-purple-400 text-5xl"></i>
            </div>
            <div>
                <h1 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600 dark:from-purple-400 dark:via-pink-400 dark:to-cyan-400">
                    Mi Perfil
                </h1>
                <p class="text-gray-700 dark:text-gray-300 text-lg mt-1">Personaliza tu información de jugador</p>
            </div>
        </div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-purple-300 dark:bg-purple-500 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-pink-300 dark:bg-pink-500 rounded-full blur-3xl opacity-20"></div>
    </div>

    <!-- Mensajes de estado -->
    @if(session('success'))
        <div class="relative overflow-hidden rounded-xl bg-green-50 dark:bg-gradient-to-r dark:from-green-600/20 dark:to-emerald-600/20 border-2 border-green-400 dark:border-green-500/30 p-5 backdrop-blur-sm">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0yMCAwdjQwTTAgMjBoNDAiIHN0cm9rZT0iIzAwZmY4OCIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-20"></div>
            <div class="relative z-10 flex items-center gap-3">
                <div class="bg-green-200 dark:bg-green-500/30 rounded-lg p-2">
                    <i class="bi bi-check-circle-fill text-green-600 dark:text-green-400 text-2xl"></i>
                </div>
                <div>
                    <p class="text-green-800 dark:text-green-100 font-bold text-lg">¡Éxito!</p>
                    <p class="text-green-700 dark:text-green-200">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="relative overflow-hidden rounded-xl bg-red-50 dark:bg-gradient-to-r dark:from-red-600/20 dark:to-orange-600/20 border-2 border-red-400 dark:border-red-500/30 p-5 backdrop-blur-sm">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0yMCAwdjQwTTAgMjBoNDAiIHN0cm9rZT0iI2ZmMDAwMCIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-20"></div>
            <div class="relative z-10 flex gap-3">
                <div class="bg-red-200 dark:bg-red-500/30 rounded-lg p-2 h-fit">
                    <i class="bi bi-exclamation-triangle-fill text-red-600 dark:text-red-400 text-2xl"></i>
                </div>
                <div>
                    <p class="text-red-800 dark:text-red-100 font-bold text-lg mb-2">Error en el formulario</p>
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-700 dark:text-red-200 flex items-center gap-2">
                                <i class="bi bi-dot text-red-600 dark:text-red-400"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Formulario Gaming -->
    <div class="relative overflow-hidden rounded-2xl bg-white dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 border-2 border-purple-300 dark:border-purple-500/30 shadow-2xl dark:shadow-purple-500/20">
        <!-- Header del formulario -->
        <div class="relative px-8 py-6 bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-600/20 dark:via-pink-600/20 dark:to-cyan-600/20 border-b-2 border-purple-300 dark:border-purple-500/30 backdrop-blur-sm">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0yMCAwdjQwTTAgMjBoNDAiIHN0cm9rZT0iI2ZmMDBmZiIgc3Ryb2tlLXdpZHRoPSIuNSIgb3BhY2l0eT0iLjEiLz48L2c+PC9zdmc+')] opacity-20"></div>
            <div class="relative z-10 flex items-center gap-3">
                <div class="w-1 h-8 bg-gradient-to-b from-purple-500 to-pink-500 dark:from-purple-400 dark:to-pink-500 rounded-full"></div>
                <h2 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600 dark:from-purple-400 dark:to-pink-400">
                    Editar Perfil
                </h2>
            </div>
        </div>

        <!-- Contenido del formulario -->
        <form action="{{ route('cliente.perfil.update') }}" method="POST" class="p-8 space-y-8">
            @csrf

            <!-- Nombre y Apellidos -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="nombre" class="flex items-center gap-2 text-sm font-black text-purple-600 dark:text-purple-400 uppercase tracking-wider">
                        <i class="bi bi-person-fill"></i>
                        Nombre
                    </label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}" required
                           class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800/50 border-2 border-purple-300 dark:border-purple-500/30 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-300 hover:border-purple-400 dark:hover:border-purple-500/50">
                </div>

                <div class="space-y-2">
                    <label for="apellidos" class="flex items-center gap-2 text-sm font-black text-pink-600 dark:text-pink-400 uppercase tracking-wider">
                        <i class="bi bi-person-badge-fill"></i>
                        Apellidos
                    </label>
                    <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $usuario->apellidos) }}"
                           class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800/50 border-2 border-pink-300 dark:border-pink-500/30 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-500/20 transition-all duration-300 hover:border-pink-400 dark:hover:border-pink-500/50">
                </div>
            </div>

            <!-- Email -->
            <div class="space-y-2">
                <label for="email" class="flex items-center gap-2 text-sm font-black text-cyan-600 dark:text-cyan-400 uppercase tracking-wider">
                    <i class="bi bi-envelope-fill"></i>
                    Email
                </label>
                <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" required
                       class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800/50 border-2 border-cyan-300 dark:border-cyan-500/30 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300 hover:border-cyan-400 dark:hover:border-cyan-500/50">
            </div>

            <!-- Teléfono y Dirección -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="telefono" class="flex items-center gap-2 text-sm font-black text-blue-600 dark:text-blue-400 uppercase tracking-wider">
                        <i class="bi bi-telephone-fill"></i>
                        Teléfono
                    </label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $usuario->telefono) }}"
                           class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800/50 border-2 border-blue-300 dark:border-blue-500/30 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300 hover:border-blue-400 dark:hover:border-blue-500/50">
                </div>

                <div class="space-y-2">
                    <label for="direccion" class="flex items-center gap-2 text-sm font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">
                        <i class="bi bi-geo-alt-fill"></i>
                        Dirección
                    </label>
                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $usuario->direccion) }}"
                           class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800/50 border-2 border-indigo-300 dark:border-indigo-500/30 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300 hover:border-indigo-400 dark:hover:border-indigo-500/50">
                </div>
            </div>

            <!-- Contraseña -->
            <div class="space-y-2">
                <label for="password" class="flex items-center gap-2 text-sm font-black text-red-600 dark:text-red-400 uppercase tracking-wider">
                    <i class="bi bi-shield-lock-fill"></i>
                    Nueva Contraseña
                    <span class="text-xs text-gray-500 dark:text-gray-400 normal-case font-medium">(opcional)</span>
                </label>
                <input type="password" name="password" id="password"
                       class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-800/50 border-2 border-red-300 dark:border-red-500/30 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all duration-300 hover:border-red-400 dark:hover:border-red-500/50">
                <div class="flex items-center gap-2 mt-2">
                    <i class="bi bi-info-circle text-gray-500 dark:text-gray-400 text-sm"></i>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Deja en blanco si no quieres cambiar la contraseña</p>
                </div>
            </div>

            <!-- Botón Submit -->
            <div class="flex justify-end pt-4">
                <button type="submit" class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-purple-600 via-pink-600 to-cyan-600 hover:from-purple-500 hover:via-pink-500 hover:to-cyan-500 text-white font-black px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/50 active:scale-95 border-2 border-purple-400/30">
                    <i class="bi bi-save-fill text-xl"></i>
                    <span class="text-lg uppercase tracking-wide">Actualizar Perfil</span>
                    <i class="bi bi-arrow-right-circle-fill text-xl group-hover:translate-x-2 transition-transform duration-300"></i>
                    <div class="absolute inset-0 rounded-xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </div>
        </form>

        <!-- Footer decorativo -->
        <div class="h-2 bg-gradient-to-r from-purple-600 via-pink-600 to-cyan-600"></div>
    </div>
</div>
@endsection