{{-- Extiende el layout base de la aplicación --}}
@extends('layouts.app')

{{-- Define el título dinámico de la página con el nombre del producto --}}
@section('title', $producto->nombre . ' - Tienda de Videojuegos')

{{-- Inicia la sección de contenido principal --}}
@section('content')

{{-- Fondo principal con estilo gaming neón --}}
<div class="min-h-screen bg-gradient-to-br from-slate-950 via-purple-950 to-slate-900 relative overflow-hidden">
    {{-- Fondo animado con rejilla neón --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMCwxMjgsMC4xKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-30"></div>

    {{-- Orbes flotantes neón animados --}}
    <div class="absolute top-20 left-10 w-32 h-32 bg-pink-500/20 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute top-40 right-20 w-24 h-24 bg-cyan-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
    <div class="absolute bottom-32 left-1/4 w-40 h-40 bg-purple-500/15 rounded-full blur-xl animate-pulse delay-500"></div>
    <div class="absolute bottom-20 right-10 w-28 h-28 bg-green-400/20 rounded-full blur-xl animate-pulse delay-1500"></div>

    {{-- Contenedor principal centrado --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Encabezado neón --}}
        <div class="text-center mb-16">
            {{-- Icono de juego animado --}}
            <div class="mb-6">
                <span class="inline-block px-6 py-3 bg-gradient-to-r from-pink-500 via-purple-500 to-cyan-400 text-black font-black text-lg tracking-wider rounded-full shadow-2xl animate-pulse border-2 border-pink-400/50">
                    🎮
                </span>
            </div>

            {{-- Título principal con gradiente --}}
            <h1 class="text-6xl md:text-7xl font-black mb-6 leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-purple-400 to-cyan-400 animate-gradient drop-shadow-2xl">
                    {{ $producto->nombre }}
                </span>
            </h1>

            {{-- Descripción con elementos destacados --}}
            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                <span class="text-pink-400 font-bold">Descubre</span> todos los detalles de este increíble videojuego con
                <span class="text-cyan-400 font-bold">estilos futuristas</span>
                <i class="bi bi-lightning-charge-fill text-yellow-400 ml-2 text-2xl"></i>
            </p>
        </div>

        {{-- Cuadrícula principal de contenido --}}
        <div class="grid lg:grid-cols-2 gap-12 mb-16">
            {{-- Tarjeta de imagen del producto --}}
            <div class="group bg-black/70 backdrop-blur-xl rounded-3xl shadow-2xl hover:shadow-pink-500/25 overflow-hidden border-2 border-pink-500/40 transition-all duration-700 hover:-translate-y-4 hover:border-pink-400/70 relative">
                {{-- Efecto de brillo neón mejorado --}}
                <div class="absolute inset-0 bg-gradient-to-br from-pink-500/8 via-purple-500/8 to-cyan-400/8 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>

                {{-- Borde animado con brillo --}}
                <div class="absolute inset-0 rounded-3xl border-2 border-transparent group-hover:border-pink-400/30 transition-all duration-700 group-hover:shadow-[0_0_30px_rgba(236,72,153,0.3)]"></div>

                <div class="relative p-8">


                    {{-- Badge de producto nuevo --}}
                    @if($producto->created_at->diffInDays(now()) < 30)
                        <div class="absolute top-6 left-6 bg-gradient-to-r from-red-500 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-black shadow-2xl border border-red-400/50 animate-pulse z-10">
                            <i class="bi bi-fire mr-1"></i>NUEVO
                        </div>
                    @endif

                    {{-- Imagen del producto --}}
                    <div class="relative overflow-hidden bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl">
                        {{-- Verifica si existe imagen --}}
                        @if($producto->imagen && file_exists(public_path('storage/' . $producto->imagen)))
                            <img src="{{ asset('storage/' . $producto->imagen) }}"
                                 alt="{{ $producto->nombre }}"
                                 class="object-cover w-full h-[500px] rounded-2xl shadow-lg transition-transform duration-700 group-hover:scale-110 group-hover:brightness-110 will-change-transform"
                            >
                        {{-- Placeholder si no hay imagen --}}
                        @else
                            <div class="w-full h-[500px] flex items-center justify-center bg-gradient-to-br from-slate-800 to-slate-900 relative rounded-2xl">
                                <div class="absolute inset-0 bg-gradient-to-br from-pink-500/10 to-cyan-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700 rounded-2xl"></div>
                                <div class="text-center relative z-10">
                                    <i class="bi bi-controller text-8xl text-pink-400 drop-shadow-lg animate-pulse group-hover:text-pink-300 transition-colors duration-300"></i>
                                    <span class="block text-pink-300 text-lg font-bold tracking-wider group-hover:text-pink-200 transition-colors duration-300">SIN IMAGEN</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Tarjeta de información del producto --}}
            <div class="bg-black/70 backdrop-blur-xl rounded-3xl shadow-2xl border-2 border-pink-500/40 p-8 flex flex-col justify-between h-[500px] text-white">
                <div>
                    {{-- Título del producto --}}
                    <h2 class="text-4xl font-extrabold mb-6 text-pink-400 drop-shadow-lg">{{ $producto->nombre }}</h2>
                    {{-- Descripción --}}
                    <p class="mb-8 leading-relaxed text-justify text-gray-300">{{ $producto->descripcion }}</p>

                    {{-- Información adicional --}}
                    <div class="space-y-3 text-sm text-pink-300">
                        <p>
                            <strong class="text-pink-400">Categoría:</strong>
                            <span class="text-cyan-400">{{ $producto->categoria->nombre_categoria }}</span>
                        </p>
                        <p>
                            <strong class="text-pink-400">Estado:</strong>
                            <span class="text-green-400">{{ ucfirst($producto->estado) }}</span>
                        </p>
                    </div>

                    {{-- Precio --}}
                    <p class="text-4xl font-black text-white mt-6">${{ number_format($producto->precio, 0, ',', '.') }}</p>
                </div>

                {{-- Botones de acción --}}
                <div class="mt-8 space-y-4">
                    {{-- Formulario para agregar al carrito --}}
                    <form action="{{ route('cart.add', $producto) }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            id="btn-agregar-carrito"
                            class="w-full bg-pink-500 text-black font-extrabold py-4 px-6 rounded-3xl
                                   hover:bg-pink-600 hover:text-white transition duration-300
                                   shadow-lg hover:shadow-pink-600 transform hover:scale-105
                                   focus:outline-none focus:ring-4 focus:ring-pink-600 focus:ring-offset-2">
                            Agregar al carrito 🛒
                        </button>
                    </form>
                    {{-- Enlace para volver --}}
                    <a
                        href="{{ auth()->check() && auth()->user()->rol === 'cliente' ? route('cliente.dashboard') : route('home') }}"
                        id="btn-volver"
                        class="block w-full text-center bg-cyan-400 text-black font-extrabold py-4 px-6 rounded-3xl
                               hover:bg-cyan-500 hover:text-white transition duration-300
                               shadow-lg hover:shadow-cyan-500 transform hover:scale-105">
                        ⬅ Volver
                    </a>
                </div>
            </div>
        </div>

        {{-- Espaciador --}}
        <div class="my-20"></div>

        {{-- Sección de video --}}
        @if($videoId)
        <div class="max-w-6xl mx-auto bg-black/70 backdrop-blur-xl rounded-3xl shadow-2xl border-2 border-pink-500/40 p-6">
            {{-- Encabezado del video --}}
            <div class="flex items-center mb-6">
                <div class="w-14 h-14 bg-pink-500 rounded-full flex items-center justify-center shadow mr-4">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-pink-400">Video Trailer</h2>
                    <p class="text-gray-300 text-sm">Descubre más sobre este videojuego</p>
                </div>
            </div>

            {{-- Contenedor del video --}}
            <div class="w-full h-[500px] rounded-3xl overflow-hidden shadow-xl border border-pink-500/30">
                <iframe
                    src="https://www.youtube.com/embed/{{ $videoId }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    class="w-full h-full rounded-3xl">
                </iframe>
            </div>

            {{-- Texto de pie de página --}}
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-400 italic">
                    🎮 Video oficial del videojuego - {{ $producto->nombre }}
                </p>
            </div>
        </div>
        @endif
    {{-- Cierra el contenedor principal centrado --}}
    </div>
{{-- Cierra el fondo principal con estilo gaming neón --}}
</div>

{{-- Cierra la sección de contenido --}}
@endsection

{{-- Sección de JavaScript --}}
@section('js')
{{-- Verifica si hay mensaje de éxito en la sesión --}}
@if(session('success'))
<script>
  Swal.fire({
    title: "Producto agregado",
    text: "Producto agregado exitosamente al carrito!",
    icon: "success"
  });
</script>
@endif
{{-- Cierra la sección de JavaScript --}}
@endsection
