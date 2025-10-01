@extends('layouts.admin')

@section('page-title', 'Editar Proveedor')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Editar Proveedor</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Modifica la información del proveedor</p>
        </div>
        <a href="{{ route('proveedores.index') }}" class="group bg-gradient-to-r from-azul-rey to-blue-500 text-white font-bold py-3 px-6 rounded-2xl hover:from-blue-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl active:scale-95">
            <span class="flex items-center space-x-2">
                <span class="text-xl">⬅️</span>
                <span>Volver a Proveedores</span>
            </span>
        </a>
    </div>

    <div class="bg-gradient-to-br from-white to-blue-50 dark:from-gris-oscuro dark:to-gray-800 rounded-2xl shadow-2xl overflow-hidden border-2 border-azul-rey/30 transition-colors duration-300">
        <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-azul-rey/10 to-transparent">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-dorado bg-gradient-to-r from-gray-900 to-gray-600 dark:from-dorado dark:to-yellow-400 bg-clip-text text-transparent">Información del Proveedor</h2>
        </div>

        <form action="{{ route('proveedores.update', $proveedor) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div class="space-y-2">
                    <label for="nombre" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                        Nombre del Proveedor <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $proveedor->nombre) }}"
                           class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-dorado focus:ring-2 focus:ring-dorado/20 bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white transition-all duration-200"
                           placeholder="Ej: Distribuidora XYZ" required>
                    @error('nombre')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIT -->
                <div class="space-y-2">
                    <label for="nit" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                        NIT
                    </label>
                    <input type="text" name="nit" id="nit" value="{{ old('nit', $proveedor->nit) }}"
                           class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-dorado focus:ring-2 focus:ring-dorado/20 bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white transition-all duration-200"
                           placeholder="Ej: 901234567-8">
                    @error('nit')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="space-y-2 md:col-span-2">
                    <label for="descripcion" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                        Descripción
                    </label>
                    <textarea name="descripcion" id="descripcion" rows="3"
                              class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-dorado focus:ring-2 focus:ring-dorado/20 bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white transition-all duration-200"
                              placeholder="Describe las características del proveedor">{{ old('descripcion', $proveedor->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dirección -->
                <div class="space-y-2 md:col-span-2">
                    <label for="direccion" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                        Dirección
                    </label>
                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $proveedor->direccion) }}"
                           class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-dorado focus:ring-2 focus:ring-dorado/20 bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white transition-all duration-200"
                           placeholder="Ej: Calle 123 #45-67, Bogotá">
                    @error('direccion')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div class="space-y-2">
                    <label for="telefono" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                        Teléfono
                    </label>
                    <input type="tel" name="telefono" id="telefono" value="{{ old('telefono', $proveedor->telefono) }}"
                           class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-dorado focus:ring-2 focus:ring-dorado/20 bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white transition-all duration-200"
                           placeholder="Ej: +57 301 234 5678">
                    @error('telefono')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="space-y-2">
                    <label for="estado" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                        Estado <span class="text-red-500">*</span>
                    </label>
                    <select name="estado" id="estado"
                            class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-dorado focus:ring-2 focus:ring-dorado/20 bg-white dark:bg-gris-oscuro text-gray-900 dark:text-white transition-all duration-200">
                        <option value="activo" {{ old('estado', $proveedor->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ old('estado', $proveedor->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('estado')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200/50 dark:border-gray-700/50">
                <a href="{{ route('proveedores.show', $proveedor) }}"
                   class="px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-400 dark:hover:bg-gray-500 transition-all duration-200 font-medium">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-dorado to-yellow-400 text-black font-bold rounded-xl hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg active:scale-95">
                    <span class="flex items-center space-x-2">
                        <span>💾</span>
                        <span>Actualizar Proveedor</span>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
