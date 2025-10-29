@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-negro-oscuro transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-8 text-black dark:text-dorado">
                Editar Videojuego
            </h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-200">
                Modifica la información del producto
            </p>
        </div>

        <div class="bg-white dark:bg-gris-oscuro rounded-lg shadow-xl border-2 border-transparent dark:border-dorado overflow-hidden transition-colors duration-300">
            <div class="p-8">
                <form class="space-y-6" method="POST" enctype="multipart/form-data" action="{{ route('productos.update', $producto) }}">
                    @csrf
                    @method('PUT')

                    <!-- Campo de selección para la categoría -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Categoría
                        </label>
                        <select
                            name="id_categoria"
                            required
                            class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                   focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                        >
                            <option value="" disabled>Seleccione una categoría</option>
                            @foreach($categorias as $cat)
                                <option value="{{ $cat->id_categoria }}" {{ $producto->id_categoria == $cat->id_categoria ? 'selected' : '' }}>
                                    {{ $cat->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <!-- Campo de texto para el nombre del videojuego -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Nombre del videojuego
                        </label>
                        <input
                            type="text"
                            name="nombre"
                            value="{{ old('nombre', $producto->nombre) }}"
                            required
                            class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                   focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                        >
                    </div>
                    <br>

                    <!-- Área de texto para la descripción -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Descripción
                        </label>
                        <textarea
                            name="descripcion"
                            rows="4"
                            class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                   focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                        >{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>
                    <br>

                    <!-- Campos para precio y proveedor, organizados en un grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Campo para el precio -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                                Precio
                            </label>
                            <input
                                type="number"
                                name="precio"
                                value="{{ old('precio', $producto->precio) }}"
                                step="0.01"
                                required
                                class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                       bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                            >
                        </div>

                        <!-- Campo para el proveedor -->
                        <div class="space-y-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                                Proveedor
                            </label>
                            <select
                                name="id_proveedor"
                                required
                                class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                       bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                            >
                                <option value="" disabled>Seleccione un proveedor</option>
                                @foreach($proveedores as $prov)
                                    <option value="{{ $prov->id_proveedor }}" {{ $producto->id_proveedor == $prov->id_proveedor ? 'selected' : '' }}>
                                        {{ $prov->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>

                    <!-- Campo para el estado (activo/inactivo) -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Estado
                        </label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    id="activo"
                                    name="estado"
                                    value="activo"
                                    {{ old('estado', $producto->estado) == 'activo' ? 'checked' : '' }}
                                    class="h-4 w-4 text-[#FFD700] border-gray-300 dark:border-gray-600
                                           focus:ring-[#FFD700]"
                                >
                                <label for="activo" class="ml-2 text-sm text-gray-700 dark:text-white">
                                    Activo
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    id="inactivo"
                                    name="estado"
                                    value="inactivo"
                                    {{ old('estado', $producto->estado) == 'inactivo' ? 'checked' : '' }}
                                    class="h-4 w-4 text-[#FFD700] border-gray-300 dark:border-gray-600
                                           focus:ring-[#FFD700]"
                                >
                                <label for="inactivo" class="ml-2 text-sm text-gray-700 dark:text-white">
                                    Inactivo
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Campo para subir imagen -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Imagen (dejar vacío para mantener la actual)
                        </label>
                        <div class="mb-4">
                            <img id="imagePreview" src="{{ $producto->imagen ? asset('storage/' . $producto->imagen) : '#' }}" alt="Vista previa de la imagen" class="w-32 h-32 object-cover rounded-lg border-2 border-gray-300 dark:border-gray-600 {{ $producto->imagen ? '' : 'hidden' }}">
                        </div>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600
                                  border-dashed rounded-md hover:border-[#FFD700] dark:hover:border-[#FFD700]
                                  transition-colors">
                            <label class="relative cursor-pointer dark:bg-[#202124] rounded-md font-medium
                                                 text-dorado hover:text-[#FFE55C]">
                                <span>Cambiar imagen</span>
                                <input type="file" name="imagen" id="imagen" class="sr-only">
                            </label>
                        </div>
                    </div>

                    <!-- Campo para el video de YouTube -->
                    <div class="space-y-4">
                        <label for="video_id" class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Video de YouTube (ID o URL)
                        </label>
                        <div class="flex items-center space-x-2">
                            <input
                                type="text"
                                id="video_id"
                                name="video_id"
                                value="{{ old('video_id', $producto->video_id) }}"
                                placeholder="Pega la URL o el ID del video"
                                class="flex-grow px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                       bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                       focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                            >
                            <button type="button" id="previewVideoButton" class="px-4 py-2 border border-transparent rounded-md text-gray-900 bg-[#FFD700] hover:bg-[#FFE55C] font-medium">
                                Previsualizar
                            </button>
                        </div>
                        <div id="videoPreview" class="mt-4">
                            {{-- El video previsualizado aparecerá aquí --}}
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="pt-6 flex space-x-4">
                        <button
                            type="submit"
                            class="flex-1 flex justify-center py-2 px-4 border border-transparent rounded-md
                                   text-gray-900 bg-[#FFD700] hover:bg-[#FFE55C]
                                   font-medium focus:outline-none focus:ring-2 focus:ring-offset-2
                                   focus:ring-[#FFD700] transition-colors"
                        >
                            Actualizar Producto
                        </button>
                        <a href="{{ route('productos.index') }}"
                           class="flex-1 flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md
                                  text-gray-700 dark:text-gray-300 bg-white dark:bg-[#202124] hover:bg-gray-50 dark:hover:bg-gray-700
                                  font-medium focus:outline-none focus:ring-2 focus:ring-offset-2
                                  focus:ring-[#FFD700] transition-colors">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- PREVISUALIZACIÓN DE IMAGEN ---
        const imageInput = document.getElementById('imagen');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        // --- PREVISUALIZACIÓN DE VIDEO DE YOUTUBE ---
        const videoInput = document.getElementById('video_id');
        const videoPreviewContainer = document.getElementById('videoPreview');
        const previewButton = document.getElementById('previewVideoButton');

        function extractVideoID(text) {
            if (!text) return null;
            // Intenta hacer match con un ID de video estándar de 11 caracteres.
            const standaloneIdMatch = text.match(/^[a-zA-Z0-9_-]{11}$/);
            if (standaloneIdMatch) {
                return standaloneIdMatch[0];
            }
            // Intenta hacer match con URLs de YouTube.
            const urlMatch = text.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/);
            if (urlMatch && urlMatch[1]) {
                return urlMatch[1];
            }
            return null;
        }

        function updateVideoPreview() {
            const videoId = extractVideoID(videoInput.value.trim());
            videoPreviewContainer.innerHTML = ''; // Limpiar previsualización anterior

            if (videoId) {
                const iframe = document.createElement('iframe');
                iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}`);
                iframe.setAttribute('width', '100%');
                iframe.setAttribute('height', '315');
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
                iframe.setAttribute('allowfullscreen', 'true');
                iframe.className = 'rounded-lg shadow-lg';
                videoPreviewContainer.appendChild(iframe);
            } else if (videoInput.value.trim() !== '') {
                videoPreviewContainer.innerHTML = '<p class="text-red-500 dark:text-red-400 text-sm mt-2">No se pudo extraer un ID de video de YouTube válido.</p>';
            }
        }

        // Event listener para el botón de previsualizar
        previewButton.addEventListener('click', updateVideoPreview);

        // Cargar la previsualización del video inicial al cargar la página
        if (videoInput.value) {
            updateVideoPreview();
        }
    });
</script>
@endpush

