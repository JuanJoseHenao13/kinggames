@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-50 dark:bg-[#202124]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-8 text-black dark:text-dorado">
                Creación de Videojuegos
            </h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-blanco">
                Añade nuevos juegos a nuestro catálogo
            </p>
        </div>

        <div class="bg-white dark:bg-negro rounded-lg shadow-xl border-2 border-transparent dark:border-[#FFD700] overflow-hidden">
            <div class="p-8">
                <form class="space-y-6" method="POST" enctype="multipart/form-data" action="{{ route('productos.store') }}">
                    @csrf

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
                            <option value="" disabled selected>Seleccione una categoría</option>
                            @foreach($categorias as $cat)
                                <option value="{{$cat->id_categoria}}">{{$cat->nombre_categoria}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Campo de texto para el nombre del videojuego -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Nombre del videojuego
                        </label>
                        <input
                            type="text"
                            name="nombre"
                            required
                            class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                   focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                        >
                    </div>

                    <!-- Área de texto para la descripción -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Descripción
                        </label>
                        <textarea
                            name="descripcion"
                            required
                            rows="4"
                            class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                   focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                        ></textarea>
                    </div>

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
                                required
                                step="0.01"
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
                                <option value="" disabled selected>Seleccione un proveedor</option>
                                @foreach($proveedores as $prov)
                                    <option value="{{ $prov->id_proveedor }}">{{ $prov->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

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
                                    required
                                    class="h-4 w-4 text-[#FFD700] border-gray-300 dark:border-gray-600
                                           focus:ring-[#FFD700]"
                                >
                                <label for="activo" class="ml-2 text-sm text-gray-700 dark:text-blanco">
                                    Activo
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    type="radio"
                                    id="inactivo"
                                    name="estado"
                                    value="inactivo"
                                    class="h-4 w-4 text-[#FFD700] border-gray-300 dark:border-gray-600
                                           focus:ring-[#FFD700]"
                                >
                                <label for="inactivo" class="ml-2 text-sm text-gray-700 dark:text-blanco">
                                    Inactivo
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para subir imagen -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Imagen
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600
                                  border-dashed rounded-md hover:border-[#FFD700] dark:hover:border-[#FFD700]
                                  transition-colors">
                            <label class="relative cursor-pointer dark:bg-[#202124] rounded-md font-medium
                                                 text-dorado hover:text-[#FFE55C]">
                                <span>Subir un archivo</span>
                                <input type="file" name="imagen" id="imagen" class="sr-only" required onchange="previewImage(event)">
                            </label>
                        </div>
                        <div class="mt-4">
                            <img id="imagePreview" src="#" alt="Vista previa de la imagen" class="mx-auto rounded-lg shadow-lg hidden max-h-64">
                        </div>
                    </div>

                    <!-- Campo para el video de YouTube -->
                    <div class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-dorado">
                            Video de YouTube (ID o URL)
                        </label>
                        <input
                            type="text"
                            name="video_id"
                            placeholder="Ejemplo: twNmM6ntvMs o https://www.youtube.com/watch?v=twNmM6ntvMs"
                            class="w-full px-3 py-2 rounded-md border border-gray-300 dark:border-gray-600
                                   bg-white dark:bg-[#202124] text-gray-900 dark:text-gray-200
                                   focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition-colors"
                        >
                    </div>

                    <!-- Botón de envío -->
                    <div class="pt-6">
                        <button
                            type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md
                                   text-gray-900 dark:text-blanco bg-[#FFD700] hover:bg-[#FFE55C]
                                   font-medium focus:outline-none focus:ring-2 focus:ring-offset-2
                                   focus:ring-[#FFD700] transition-colors"
                        >
                            Guardar
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
