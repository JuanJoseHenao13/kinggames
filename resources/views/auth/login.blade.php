@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="bg-white dark:bg-gris-oscuro rounded-lg shadow-lg p-8">
            <h2 class="text-center text-3xl font-extrabold text-gray-900 dark:text-white mb-8">
                {{ __('Iniciar sesión') }}
            </h2>

            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Correo electrónico') }}
                    </label>
                    <div class="mt-1">
                        <input id="email" type="email" name="email" required 
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                                      rounded-md shadow-sm placeholder-gray-400 
                                      focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 
                                      bg-white dark:bg-gray-700 text-gray-900"
                               value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white">
                        {{ __('Contraseña') }}
                    </label>
                    <div class="mt-1">
                        <input id="password" type="password" name="password" required 
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                                      rounded-md shadow-sm placeholder-gray-400 
                                      focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 
                                      bg-white dark:bg-gray-700 text-gray-900">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" name="remember" 
                               class="h-4 w-4 text-dorado focus:ring-dorado border-gray-300 rounded
                                      dark:border-gray-600 dark:bg-gray-700">
                        <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-white">
                            {{ __('Recordarme') }}
                        </label>
                    </div>
                    <br></br>
                    <!-- @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm font-medium text-yellow-600 hover:text-yellow-500 dark:text-yellow-400 dark:hover:text-yellow-300">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif -->
                </div>

                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium 
                                   text-gray-700 dark:text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 
                                   focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200">
                        {{ __('Iniciar sesión') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection