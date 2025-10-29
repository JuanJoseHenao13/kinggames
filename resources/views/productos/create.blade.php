@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 relative overflow-hidden">
    <!-- Fondo animado con partículas -->
    <div class="absolute inset-0 bg-gradient-to-r from-purple-900/10 via-blue-900/10 to-cyan-900/10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-12">
            <div class="mb-6">
                <a href="{{ route('productos.index') }}"
                   class="inline-flex items-center px-6 py-3 border-2 border-white/20
                          rounded-xl text-sm font-bold text-white
                          bg-white/10 backdrop-blur-md hover:bg-white/20
                          focus:outline-none focus:ring-2 focus:ring-yellow-400
                          transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-yellow-400/20">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <i class="bi bi-arrow-left mr-2"></i>
                    Volver a Gestión de Productos
                </a>
            </div>

            <!-- Gaming Header -->
            <div class="mb-8">
                <div class="inline-block mb-4">
                    <span class="px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold rounded-full text-sm tracking-wider shadow-lg animate-pulse">
                        🎮 CREACIÓN DE JUEGOS
                    </span>
                </div>

                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 animate-gradient">
                        AÑADIR NUEVO
                    </span>
                    <br>
                    <span class="text-white drop-shadow-2xl">
                        VIDEOJUEGO
                    </span>
                </h1>

                <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Completa el formulario para añadir un nuevo juego a nuestro
                    <span class="text-yellow-400 font-bold">catálogo gaming</span>
                    <i class="bi bi-controller text-yellow-400 ml-2"></i>
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
                        <span class="text-white font-bold text-lg">Detalles del Juego</span>
                        <i class="bi bi-controller text-orange-400 text-2xl"></i>
                    </div>
                </div>
                <form class="space-y-6" method="POST" enctype="multipart/form-data" action="{{ route('productos.store') }}">
                    @csrf

                    <!-- Campo de selección para la categoría -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-tags-fill mr-2 text-orange-400"></i>
                            Categoría
                        </label>
                        <select
                            name="id_categoria"
                            required
                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                   bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                   focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                   transition-all duration-300 hover:border-yellow-400/50"
                            >
                            <option value="" disabled selected class="bg-slate-900 text-white">🎯 Seleccione una categoría</option>
                            @foreach($categorias as $cat)
                                <option value="{{$cat->id_categoria}}" class="bg-slate-900 text-white">{{$cat->nombre_categoria}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Campo de texto para el nombre del videojuego -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-controller mr-2 text-orange-400"></i>
                            Nombre del videojuego
                        </label>
                        <input
                            type="text"
                            name="nombre"
                            required
                            placeholder="Ej: The Legend of Zelda: Breath of the Wild"
                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                   bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                   focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                   transition-all duration-300 hover:border-yellow-400/50"
                        >
                    </div>

                    <!-- Área de texto para la descripción -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-file-text-fill mr-2 text-orange-400"></i>
                            Descripción
                        </label>
                        <textarea
                            name="descripcion"
                            required
                            rows="4"
                            placeholder="Describe las características principales del juego..."
                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                   bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                   focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                   transition-all duration-300 hover:border-yellow-400/50 resize-none"
                        ></textarea>
                    </div>

                    <!-- Campos para precio y proveedor, organizados en un grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Campo para el precio -->
                        <div class="space-y-4">
                            <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                                <i class="bi bi-cash mr-2 text-orange-400"></i>
                                Precio ($)
                            </label>
                            <input
                                type="number"
                                name="precio"
                                required
                                step="0.01"
                                placeholder="0.00"
                                class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                       bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                       focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                       transition-all duration-300 hover:border-yellow-400/50"
                            >
                        </div>

                        <!-- Campo para el proveedor -->
                        <div class="space-y-4">
                            <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                                <i class="bi bi-building mr-2 text-orange-400"></i>
                                Proveedor
                            </label>
                            <select
                                name="id_proveedor"
                                required
                                class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                       bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                       focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                       transition-all duration-300 hover:border-yellow-400/50"
                            >
                                <option value="" disabled selected class="bg-slate-900 text-white">🏢 Seleccione un proveedor</option>
                                @foreach($proveedores as $prov)
                                    <option value="{{ $prov->id_proveedor }}" class="bg-slate-900 text-white">{{ $prov->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Campo para el estado (activo/inactivo) -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-toggle-on mr-2 text-orange-400"></i>
                            Estado del Juego
                        </label>
                        <div class="flex gap-6 justify-center">
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    id="activo"
                                    name="estado"
                                    value="activo"
                                    required
                                    class="h-5 w-5 text-green-400 border-white/30 bg-white/10
                                           focus:ring-green-400 focus:ring-2"
                                >
                                <label for="activo" class="ml-3 text-white font-medium cursor-pointer hover:text-green-400 transition-colors">
                                    <i class="bi bi-check-circle-fill text-green-400 mr-2"></i>
                                    Activo
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    id="inactivo"
                                    name="estado"
                                    value="inactivo"
                                    class="h-5 w-5 text-red-400 border-white/30 bg-white/10
                                           focus:ring-red-400 focus:ring-2"
                                >
                                <label for="inactivo" class="ml-3 text-white font-medium cursor-pointer hover:text-red-400 transition-colors">
                                    <i class="bi bi-x-circle-fill text-red-400 mr-2"></i>
                                    Inactivo
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para subir imagen -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-image mr-2 text-orange-400"></i>
                            Imagen del Juego
                        </label>
                        <div class="relative">
                            <div class="mt-1 flex justify-center px-8 pt-8 pb-8 border-2 border-dashed border-white/30
                                      rounded-2xl hover:border-yellow-400/70 transition-all duration-300
                                      bg-gradient-to-br from-white/5 to-white/10 hover:from-yellow-400/10 hover:to-orange-500/10">
                                <div class="text-center">
                                    <i class="bi bi-cloud-upload-fill text-4xl text-yellow-400 mb-4"></i>
                                    <label class="relative cursor-pointer">
                                        <span class="text-white font-bold text-lg">Haz clic para subir imagen</span>
                                        <span class="block text-gray-300 text-sm mt-1">PNG, JPG, GIF hasta 10MB</span>
                                        <input type="file" name="imagen" id="imagen" class="sr-only" required onchange="previewImage(event)">
                                    </label>
                                </div>
                            </div>
                            <div class="mt-6">
                                <img id="imagePreview" src="#" alt="Vista previa de la imagen" class="mx-auto rounded-2xl shadow-2xl border-2 border-white/20 hidden max-h-64 transition-all duration-300 hover:scale-105">
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el video de YouTube -->
                    <div class="space-y-4">
                        <label class="flex items-center text-sm font-bold text-yellow-400 mb-2">
                            <i class="bi bi-youtube mr-2 text-orange-400"></i>
                            Video de YouTube (Opcional)
                        </label>
                        <input
                            type="text"
                            id="video_id"
                            name="video_id"
                            placeholder="Ej: twNmM6ntvMs o https://www.youtube.com/watch?v=twNmM6ntvMs"
                            class="w-full px-4 py-3 rounded-xl border-2 border-white/20
                                   bg-white/10 backdrop-blur-sm text-white placeholder-gray-300
                                   focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 focus:bg-white/20
                                   transition-all duration-300 hover:border-yellow-400/50"
                        >
                        <div id="videoPreview" class="mt-6 rounded-2xl overflow-hidden shadow-2xl border-2 border-white/20"></div>
                    </div>

                    <!-- Botón de envío -->
                    <div class="pt-6">
                        <button
                            type="submit"
                            class="w-full flex justify-center items-center py-4 px-8 border-2 border-yellow-400
                                   rounded-2xl text-black bg-gradient-to-r from-yellow-400 to-orange-500
                                   hover:from-yellow-500 hover:to-orange-600 font-bold text-lg
                                   focus:outline-none focus:ring-4 focus:ring-yellow-400/50
                                   transition-all duration-300 hover:scale-105 shadow-2xl hover:shadow-yellow-400/30
                                   transform hover:-translate-y-1"
                        >
                            <i class="bi bi-rocket-takeoff-fill mr-3 text-xl"></i>
                            🚀 ¡Crear Videojuego!
                            <i class="bi bi-controller ml-3 text-xl"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.classList.add('hidden');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Video Preview
    const videoInput = document.getElementById('video_id');
    const videoPreview = document.getElementById('videoPreview');

    function updateVideoPreview() {
        const videoIdOrUrl = videoInput.value.trim();
        let videoId = '';

        if (videoIdOrUrl.includes('youtube.com/watch?v=')) {
            try {
                const url = new URL(videoIdOrUrl);
                videoId = url.searchParams.get('v');
            } catch (e) {
                videoId = '';
            }
        } else if (videoIdOrUrl.includes('youtu.be/')) {
            try {
                const url = new URL(videoIdOrUrl);
                videoId = url.pathname.substring(1);
            } catch (e) {
                videoId = '';
            }
        } else {
            videoId = videoIdOrUrl;
        }

        videoPreview.innerHTML = '';
        if (videoId) {
            const iframe = document.createElement('iframe');
            iframe.width = '100%';
            iframe.height = '315';
            iframe.src = `https://www.youtube.com/embed/${videoId}`;
            iframe.title = 'YouTube video player';
            iframe.frameborder = '0';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowfullscreen = true;
            videoPreview.appendChild(iframe);
        }
    }

    videoInput.addEventListener('input', updateVideoPreview);
});

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
</script>

@endsection
