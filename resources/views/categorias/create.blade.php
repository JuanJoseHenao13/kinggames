@extends('layouts.admin')

@section('page-title', 'Crear Nueva Categoría')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 relative overflow-hidden">
    <!-- Fondo animado con partículas -->
    <div class="absolute inset-0 bg-gradient-to-r from-purple-900/10 via-blue-900/10 to-cyan-900/10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-12">
            <div class="mb-6">
                <a href="{{ route('categorias.index') }}"
                   class="inline-flex items-center px-6 py-3 border-2 border-white/20
                          rounded-xl text-sm font-bold text-white
                          bg-white/10 backdrop-blur-md hover:bg-white/20
                          focus:outline-none focus:ring-2 focus:ring-yellow-400
                          transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-yellow-400/20">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <i class="bi bi-arrow-left mr-2"></i>
                    Volver a Gestión de Categorías
                </a>
            </div>

            <!-- Gaming Header -->
            <div class="mb-8">
                <div class="inline-block mb-4">
                    <span class="px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold rounded-full text-sm tracking-wider shadow-lg animate-pulse">
                        🎮 CREACIÓN DE CATEGORÍAS
                    </span>
                </div>

                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 animate-gradient">
                        NUEVA
                    </span>
                    <br>
                    <span class="text-white drop-shadow-2xl">
                        CATEGORÍA
                    </span>
                </h1>

                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Crea una nueva categoría para organizar mejor tu
                    <span class="text-yellow-400 font-bold">catálogo gaming</span>
                    <i class="bi bi-tags-fill text-yellow-400 ml-2"></i>
                </p>
            </div>
        </div>

        <!-- Gaming Form Container -->
        <div class="relative bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
            <!-- Efecto de brillo -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent -skew-x-12 animate-shimmer"></div>

            <div class="relative p-8">
                <!-- Form Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-yellow-400/20 to-orange-500/20 rounded-2xl border border-yellow-400/30 mb-4">
                        <i class="bi bi-plus-circle-fill text-yellow-400 text-2xl"></i>
                        <span class="text-white font-bold text-lg">Detalles de la Categoría</span>
                        <i class="bi bi-tags-fill text-orange-400 text-2xl"></i>
                    </div>
                </div>

                <form method="POST" action="{{ route('categorias.store') }}" class="space-y-6">
                    @csrf

                    <!-- Campo para el nombre de la categoría -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-tag-fill mr-2 text-orange-400"></i>
                            Nombre de la Categoría
                        </label>
                        <input
                            type="text"
                            id="nombre_categoria"
                            name="nombre_categoria"
                            value="{{ old('nombre_categoria') }}"
                            placeholder="Ej: Acción, Aventura, RPG..."
                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                   bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                   focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                   transition-all duration-300 hover:border-yellow-400/50"
                            required
                        >
                        @error('nombre_categoria')
                            <p class="mt-2 text-sm text-red-400 flex items-center">
                                <i class="bi bi-exclamation-triangle-fill mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Área de texto para la descripción -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-file-text-fill mr-2 text-orange-400"></i>
                            Descripción
                        </label>
                        <textarea
                            id="descripcion"
                            name="descripcion"
                            rows="5"
                            placeholder="Describe las características de esta categoría de juegos..."
                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                   bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                   focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                   transition-all duration-300 hover:border-yellow-400/50 resize-none"
                            required
                        >{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <p class="mt-2 text-sm text-red-400 flex items-center">
                                <i class="bi bi-exclamation-triangle-fill mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Botones de acción -->
                    <div class="pt-6 flex gap-4 justify-center">
                        <a href="{{ route('categorias.index') }}"
                           class="flex items-center px-8 py-3 border-2 border-white/30
                                  rounded-2xl text-white font-bold
                                  bg-white/10 backdrop-blur-md hover:bg-white/20
                                  focus:outline-none focus:ring-2 focus:ring-white/50
                                  transition-all duration-300 hover:scale-105 shadow-lg">
                            <i class="bi bi-x-circle-fill mr-3 text-xl"></i>
                            Cancelar
                        </a>
                        <button type="submit"
                                class="flex items-center px-8 py-3 border-2 border-yellow-400
                                       rounded-2xl text-black bg-gradient-to-r from-yellow-400 to-orange-500
                                       hover:from-yellow-500 hover:to-orange-600 font-bold
                                       focus:outline-none focus:ring-4 focus:ring-yellow-400/50
                                       transition-all duration-300 hover:scale-105 shadow-2xl hover:shadow-yellow-400/30
                                       transform hover:-translate-y-1">
                            <i class="bi bi-rocket-takeoff-fill mr-3 text-xl"></i>
                            🚀 ¡Crear Categoría!
                            <i class="bi bi-tags-fill ml-3 text-xl"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@if(session('ok')=='ok')
<script>
  Swal.fire({
    title: "Categoría",
    text: "Categoría creada exitosamente!",
    icon: "success"
  });
</script>
@endif
@endsection
