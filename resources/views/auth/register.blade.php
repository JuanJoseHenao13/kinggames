@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div class="bg-white dark:bg-gris-oscuro rounded-lg shadow-md p-6">
            <h2 class="text-center text-2xl font-bold text-gray-900 dark:text-white mb-6">
                {{ __('Registro') }}
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                {{-- Nombre --}}
                <div class="space-y-1">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Nombre') }}
                    </label>
                    <input id="nombre" type="text" name="nombre" required autofocus
                           class="h-9 block w-full px-3 text-sm border border-gray-300 
                                  rounded-md bg-white text-gray-900
                                  dark:bg-gray-700 dark:border-gray-600 
                                  focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                           value="{{ old('nombre') }}">
                    @error('nombre')
                        <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Apellidos --}}
                <div class="space-y-1">
                    <label for="apellidos" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Apellidos') }}
                    </label>
                    <input id="apellidos" type="text" name="apellidos" required
                           class="h-9 block w-full px-3 text-sm border border-gray-300 
                                  rounded-md bg-white text-gray-900
                                  dark:bg-gray-700 dark:border-gray-600 
                                  focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                           value="{{ old('apellidos') }}">
                    @error('apellidos')
                        <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Correo electrónico') }}
                    </label>
                    <input id="email" type="email" name="email" required
                           class="h-9 block w-full px-3 text-sm border border-gray-300 
                                  rounded-md bg-white text-gray-900
                                  dark:bg-gray-700 dark:border-gray-600 
                                  focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                           value="{{ old('email') }}">
                    @error('email')
                        <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contraseña --}}
                <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Contraseña') }}
                    </label>
                    <input id="password" type="password" name="password" required
                           class="h-9 block w-full px-3 text-sm border border-gray-300 
                                  rounded-md bg-white text-gray-900
                                  dark:bg-gray-700 dark:border-gray-600 
                                  focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                    @error('password')
                        <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirmar Contraseña --}}
                <div class="space-y-1">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Confirmar contraseña') }}
                    </label>
                    <input id="password-confirm" type="password" name="password_confirmation" required
                           class="h-9 block w-full px-3 text-sm border border-gray-300 
                                  rounded-md bg-white text-gray-900
                                  dark:bg-gray-700 dark:border-gray-600 
                                  focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                {{-- Teléfono --}}
                <div class="space-y-1">
                    <label for="telefono" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Teléfono') }}
                    </label>
                    <input id="telefono" type="text" name="telefono"
                           class="h-9 block w-full px-3 text-sm border border-gray-300 
                                  rounded-md bg-white text-gray-900
                                  dark:bg-gray-700 dark:border-gray-600 
                                  focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                           value="{{ old('telefono') }}">
                    @error('telefono')
                        <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Dirección --}}
                <div class="space-y-1">
                    <label for="direccion" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Dirección') }}
                    </label>
                    <input id="direccion" type="text" name="direccion"
                           class="h-9 block w-full px-3 text-sm border border-gray-300 
                                  rounded-md bg-white text-gray-900
                                  dark:bg-gray-700 dark:border-gray-600 
                                  focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                           value="{{ old('direccion') }}">
                    @error('direccion')
                        <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                

                <div class="pt-6">
                    <button type="submit" 
                            class="w-full h-9 flex justify-center items-center border border-transparent 
                                   rounded-md text-sm font-medium text-gray-700 dark:text-white bg-yellow-500 
                                   hover:bg-yellow-400 focus:outline-none focus:ring-2 
                                   focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                        {{ __('Registrarse') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection