@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-3xl">
    <!-- Título principal -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800 dark:text-dorado flex items-center justify-center gap-3">
            <svg class="w-8 h-8 text-azul-rey dark:text-dorado" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Crear Nuevo Usuario
        </h1>
        <p class="text-gray-500 dark:text-gray-300 mt-2">Complete el formulario para registrar un nuevo usuario.</p>
    </div>

    <!-- Formulario -->
    <form action="{{ route('usuarios.store') }}" method="POST" class="bg-blanco dark:bg-gris-oscuro rounded-2xl shadow-2xl p-8 border border-gris-medio/20 transition-all duration-300 hover:shadow-3xl">
        @csrf

        <!-- Nombre y Apellidos en fila (responsive) -->
        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <!-- Nombre -->
            <div class="space-y-2">
                <label for="nombre" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300">
                @error('nombre')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Apellidos -->
            <div class="space-y-2">
                <label for="apellidos" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos') }}" required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300">
                @error('apellidos')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="mb-6 space-y-2">
            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300">
            @error('email')
                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Teléfono y Dirección -->
        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <!-- Teléfono -->
            <div class="space-y-2">
                <label for="telefono" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Teléfono</label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300"
                    placeholder="Ej: +57 300 123 4567">
                @error('telefono')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="space-y-2">
                <label for="direccion" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Dirección</label>
                <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}"
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300"
                    placeholder="Ej: Calle 123 #45-67">
                @error('direccion')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>

        <!-- Contraseña y Confirmación -->
        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <!-- Contraseña -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Contraseña</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300"
                    placeholder="••••••••">
                @error('password')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300"
                    placeholder="••••••••">
            </div>
        </div>

        <!-- Rol -->
        <div class="mb-8 space-y-2">
            <label for="rol" class="block text-sm font-semibold text-gray-700 dark:text-blanco">Rol</label>
            <select name="rol" id="rol" required
                class="w-full px-4 py-3 border border-gray-300 dark:border-gris-medio rounded-xl bg-white dark:bg-negro-oscuro text-gray-900 dark:text-blanco focus:outline-none focus:ring-4 focus:ring-azul-rey/20 dark:focus:ring-dorado/30 focus:border-azul-rey dark:focus:border-dorado transition-all duration-300">
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="cliente" {{ old('rol') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('rol')
                <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Botones -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
            <a href="{{ route('usuarios.index') }}"
                class="text-center py-3 px-6 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-gray-400">
                ⬅ Cancelar
            </a>
            <button type="submit"
                class="py-3 px-6 bg-verde hover:bg-verde-oscuro text-white font-bold rounded-xl transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-verde/40">
                ✅ Crear Usuario
            </button>
        </div>
    </form>
</div>
@endsection