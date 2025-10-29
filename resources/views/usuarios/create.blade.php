@extends('layouts.admin')

@section('content')
<div class="relative min-h-screen py-12 px-4 sm:px-6 lg:px-8 overflow-hidden">

    {{-- Fondo con gradiente animado --}}
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-blue-900/20 dark:to-purple-900/20 -z-20"></div>
    
    {{-- Partículas doradas mejoradas --}}
    <div id="particles" class="absolute inset-0 -z-10"></div>
    
    {{-- Efectos de luz de fondo --}}
    <div class="absolute top-1/4 -left-48 w-96 h-96 bg-blue-400/30 dark:bg-blue-600/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 -right-48 w-96 h-96 bg-purple-400/30 dark:bg-purple-600/20 rounded-full blur-3xl animate-pulse delay-1000"></div>

    <div class="relative container mx-auto max-w-4xl">
        <!-- Título principal mejorado -->
        <div class="text-center mb-12 animate-fadeIn">
            <div class="inline-block">
                <div class="relative">
                    <h1 class="text-5xl md:text-6xl font-black bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 dark:from-blue-400 dark:via-purple-400 dark:to-pink-400 bg-clip-text text-transparent mb-4 animate-gradient">
                        Crear Nuevo Usuario
                    </h1>
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 opacity-30 blur-2xl -z-10 animate-pulse"></div>
                </div>
                <div class="flex items-center justify-center gap-2 mt-4">
                    <div class="h-1 w-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
                    <svg class="w-10 h-10 text-purple-600 dark:text-purple-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <div class="h-1 w-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full"></div>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mt-6 text-lg font-medium">Complete el formulario para registrar un nuevo usuario en el sistema.</p>
        </div>

        <!-- Formulario mejorado -->
        <form action="{{ route('usuarios.store') }}" method="POST"
            class="relative bg-white/80 dark:bg-gray-800/80 backdrop-blur-2xl rounded-3xl shadow-2xl 
                   border border-gray-200/50 dark:border-gray-700/50 p-8 md:p-12
                   transition-all duration-500 hover:shadow-purple-500/20 hover:shadow-3xl
                   animate-fadeIn before:absolute before:inset-0 before:rounded-3xl before:bg-gradient-to-br before:from-blue-500/5 before:to-purple-500/5 before:-z-10"
            id="crearUsuarioForm">
            @csrf

            <!-- Información Personal -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    Información Personal
                </h2>

                <!-- Nombre y Apellidos -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div class="group">
                        <label for="nombre" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-blue-600 dark:group-focus-within:text-blue-400">
                            Nombre <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                                class="w-full px-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                       bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                       placeholder-gray-400 dark:placeholder-gray-500
                                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400
                                       focus:ring-4 focus:ring-blue-500/20 dark:focus:ring-blue-400/30
                                       transition-all duration-300 shadow-sm hover:shadow-md
                                       group-hover:border-blue-400"
                                placeholder="Ingrese el nombre">
                            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 to-purple-500/0 group-focus-within:from-blue-500/5 group-focus-within:to-purple-500/5 pointer-events-none transition-all duration-300"></div>
                        </div>
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1 animate-shake">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="group">
                        <label for="apellidos" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-purple-600 dark:group-focus-within:text-purple-400">
                            Apellidos <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos') }}" required
                                class="w-full px-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                       bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                       placeholder-gray-400 dark:placeholder-gray-500
                                       focus:outline-none focus:border-purple-500 dark:focus:border-purple-400
                                       focus:ring-4 focus:ring-purple-500/20 dark:focus:ring-purple-400/30
                                       transition-all duration-300 shadow-sm hover:shadow-md
                                       group-hover:border-purple-400"
                                placeholder="Ingrese los apellidos">
                            <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-purple-500/0 to-pink-500/0 group-focus-within:from-purple-500/5 group-focus-within:to-pink-500/5 pointer-events-none transition-all duration-300"></div>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-6 group">
                    <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-blue-600 dark:group-focus-within:text-blue-400">
                        Correo Electrónico <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full pl-12 pr-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                   bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                   placeholder-gray-400 dark:placeholder-gray-500
                                   focus:outline-none focus:border-blue-500 dark:focus:border-blue-400
                                   focus:ring-4 focus:ring-blue-500/20 dark:focus:ring-blue-400/30
                                   transition-all duration-300 shadow-sm hover:shadow-md
                                   group-hover:border-blue-400"
                            placeholder="correo@ejemplo.com">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/0 to-cyan-500/0 group-focus-within:from-blue-500/5 group-focus-within:to-cyan-500/5 pointer-events-none transition-all duration-300"></div>
                    </div>
                </div>
            </div>

            <!-- Información de Contacto -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </span>
                    Información de Contacto
                </h2>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="group">
                        <label for="telefono" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-green-600 dark:group-focus-within:text-green-400">
                            Teléfono
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}"
                                class="w-full pl-12 pr-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                       bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                       placeholder-gray-400 dark:placeholder-gray-500
                                       focus:outline-none focus:border-green-500 dark:focus:border-green-400
                                       focus:ring-4 focus:ring-green-500/20 dark:focus:ring-green-400/30
                                       transition-all duration-300 shadow-sm hover:shadow-md
                                       group-hover:border-green-400"
                                placeholder="+57 300 123 4567">
                        </div>
                    </div>

                    <div class="group">
                        <label for="direccion" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-emerald-600 dark:group-focus-within:text-emerald-400">
                            Dirección
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}"
                                class="w-full pl-12 pr-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                       bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                       placeholder-gray-400 dark:placeholder-gray-500
                                       focus:outline-none focus:border-emerald-500 dark:focus:border-emerald-400
                                       focus:ring-4 focus:ring-emerald-500/20 dark:focus:ring-emerald-400/30
                                       transition-all duration-300 shadow-sm hover:shadow-md
                                       group-hover:border-emerald-400"
                                placeholder="Calle 123 #45-67">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seguridad -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center gap-3">
                    <span class="w-10 h-10 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    Seguridad y Acceso
                </h2>

                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div class="group">
                        <label for="password" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-red-600 dark:group-focus-within:text-red-400">
                            Contraseña <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-12 pr-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                       bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                       focus:outline-none focus:border-red-500 dark:focus:border-red-400
                                       focus:ring-4 focus:ring-red-500/20 dark:focus:ring-red-400/30
                                       transition-all duration-300 shadow-sm hover:shadow-md
                                       group-hover:border-red-400"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="group">
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-pink-600 dark:group-focus-within:text-pink-400">
                            Confirmar Contraseña <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-pink-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="w-full pl-12 pr-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                       bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                       focus:outline-none focus:border-pink-500 dark:focus:border-pink-400
                                       focus:ring-4 focus:ring-pink-500/20 dark:focus:ring-pink-400/30
                                       transition-all duration-300 shadow-sm hover:shadow-md
                                       group-hover:border-pink-400"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <!-- Rol -->
                <div class="group">
                    <label for="rol" class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-2 transition-colors group-focus-within:text-indigo-600 dark:group-focus-within:text-indigo-400">
                        Rol del Usuario <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <select name="rol" id="rol" required
                            class="w-full pl-12 pr-5 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl
                                   bg-white dark:bg-gray-900/50 text-gray-900 dark:text-white
                                   focus:outline-none focus:border-indigo-500 dark:focus:border-indigo-400
                                   focus:ring-4 focus:ring-indigo-500/20 dark:focus:ring-indigo-400/30
                                   transition-all duration-300 shadow-sm hover:shadow-md cursor-pointer
                                   group-hover:border-indigo-400">
                            <option value="" disabled selected>Seleccione un rol</option>
                            <option value="cliente" {{ old('rol') == 'cliente' ? 'selected' : '' }}>👤 Cliente</option>
                            <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>⭐ Administrador</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6 border-t-2 border-gray-200 dark:border-gray-700">
                <a href="{{ route('usuarios.index') }}"
                    class="group relative text-center py-4 px-8 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 
                           text-white font-bold rounded-2xl transition-all duration-300 
                           shadow-lg hover:shadow-2xl hover:shadow-gray-500/50 transform hover:scale-105 hover:-translate-y-1
                           overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancelar
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-400/0 via-gray-400/30 to-gray-400/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                </a>

                <button type="submit"
                    class="group relative py-4 px-8 bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 
                           hover:from-green-600 hover:via-emerald-600 hover:to-teal-600
                           text-white font-bold rounded-2xl transition-all duration-300 
                           shadow-lg hover:shadow-2xl hover:shadow-green-500/50 transform hover:scale-105 hover:-translate-y-1
                           focus:outline-none focus:ring-4 focus:ring-green-500/50 overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 transition-transform group-hover:rotate-12 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Crear Usuario
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/30 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                    <div class="absolute inset-0 bg-gradient-to-br from-green-400/20 to-teal-400/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- CDN de SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Scripts mejorados --}}
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Partículas mejoradas con colores dinámicos
    const canvas = document.createElement("canvas");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    canvas.style.position = 'absolute';
    canvas.style.top = '0';
    canvas.style.left = '0';
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    document.getElementById("particles").appendChild(canvas);
    
    const ctx = canvas.getContext("2d");
    const colors = [
        'rgba(59, 130, 246, 0.4)',   // blue
        'rgba(147, 51, 234, 0.4)',    // purple
        'rgba(236, 72, 153, 0.4)',    // pink
        'rgba(251, 191, 36, 0.4)',    // amber
        'rgba(16, 185, 129, 0.4)'     // emerald
    ];
    
    const particles = Array.from({ length: 80 }, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r: Math.random() * 3 + 1,
        d: Math.random() * 0.8 + 0.2,
        color: colors[Math.floor(Math.random() * colors.length)],
        opacity: Math.random() * 0.5 + 0.3
    }));

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => {
            ctx.fillStyle = p.color;
            ctx.globalAlpha = p.opacity;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fill();
            
            // Efecto de brillo
            const gradient = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.r * 2);
            gradient.addColorStop(0, p.color.replace('0.4', '0.6'));
            gradient.addColorStop(1, p.color.replace('0.4', '0'));
            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r * 2, 0, Math.PI * 2);
            ctx.fill();
        });
        ctx.globalAlpha = 1;
        update();
    }

    function update() {
        particles.forEach(p => {
            p.y += p.d;
            p.x += Math.sin(p.y * 0.01) * 0.5;
            if (p.y > canvas.height) {
                p.y = 0;
                p.x = Math.random() * canvas.width;
            }
        });
    }

    setInterval(draw, 30);

    // Redimensionar canvas
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });

    // Validación del formulario con SweetAlert2
    const form = document.getElementById("crearUsuarioForm");
    const password = document.getElementById("password");
    const passwordConfirm = document.getElementById("password_confirmation");

    // Validación en tiempo real de contraseñas
    passwordConfirm.addEventListener('input', () => {
        if (password.value !== passwordConfirm.value) {
            passwordConfirm.setCustomValidity('Las contraseñas no coinciden');
            passwordConfirm.classList.add('border-red-500');
            passwordConfirm.classList.remove('border-green-500');
        } else {
            passwordConfirm.setCustomValidity('');
            passwordConfirm.classList.remove('border-red-500');
            passwordConfirm.classList.add('border-green-500');
        }
    });

    // Animación y confirmación al enviar
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        
        // Verificar que las contraseñas coincidan
        if (password.value !== passwordConfirm.value) {
            Swal.fire({
                icon: 'error',
                title: '¡Contraseñas no coinciden!',
                text: 'Por favor, asegúrate de que ambas contraseñas sean iguales.',
                confirmButtonColor: '#EF4444',
                confirmButtonText: 'Entendido',
                background: document.documentElement.classList.contains('dark') ? '#1F2937' : '#FFFFFF',
                color: document.documentElement.classList.contains('dark') ? '#F9FAFB' : '#111827',
                showClass: {
                    popup: 'animate__animated animate__shakeX'
                }
            });
            return;
        }

        // Confirmación antes de crear
        Swal.fire({
            title: '¿Crear nuevo usuario?',
            html: `
                <div class="text-left space-y-2 mt-4">
                    <p><strong>Nombre:</strong> ${document.getElementById('nombre').value} ${document.getElementById('apellidos').value}</p>
                    <p><strong>Email:</strong> ${document.getElementById('email').value}</p>
                    <p><strong>Rol:</strong> ${document.getElementById('rol').options[document.getElementById('rol').selectedIndex].text}</p>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10B981',
            cancelButtonColor: '#6B7280',
            confirmButtonText: '✅ Sí, crear',
            cancelButtonText: '❌ Cancelar',
            background: document.documentElement.classList.contains('dark') ? '#1F2937' : '#FFFFFF',
            color: document.documentElement.classList.contains('dark') ? '#F9FAFB' : '#111827',
            showClass: {
                popup: 'animate__animated animate__zoomIn animate__faster'
            },
            hideClass: {
                popup: 'animate__animated animate__zoomOut animate__faster'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Mostrar loading
                Swal.fire({
                    title: 'Creando usuario...',
                    html: '<div class="flex justify-center"><div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-blue-500"></div></div>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    background: document.documentElement.classList.contains('dark') ? '#1F2937' : '#FFFFFF',
                    color: document.documentElement.classList.contains('dark') ? '#F9FAFB' : '#111827',
                });
                
                // Animación del formulario
                form.classList.add('animate-pulse');
                
                // Enviar formulario
                setTimeout(() => {
                    form.submit();
                }, 500);
            }
        });
    });

    // Animación de entrada de los campos
    const animateFields = () => {
        const fields = document.querySelectorAll('input, select');
        fields.forEach((field, index) => {
            field.style.opacity = '0';
            field.style.transform = 'translateY(20px)';
            setTimeout(() => {
                field.style.transition = 'all 0.5s ease';
                field.style.opacity = '1';
                field.style.transform = 'translateY(0)';
            }, index * 50);
        });
    };

    animateFields();

    // Efecto de enfoque mejorado
    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('scale-[1.02]');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('scale-[1.02]');
        });
    });
});

// Mostrar mensajes de éxito si existen (desde Laravel)
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#10B981',
        confirmButtonText: 'Perfecto',
        background: document.documentElement.classList.contains('dark') ? '#1F2937' : '#FFFFFF',
        color: document.documentElement.classList.contains('dark') ? '#F9FAFB' : '#111827',
        timer: 3000,
        timerProgressBar: true,
        showClass: {
            popup: 'animate__animated animate__bounceIn'
        }
    });
@endif

// Mostrar mensajes de error si existen
@if($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Errores en el formulario',
        html: `
            <ul class="text-left list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
        confirmButtonColor: '#EF4444',
        confirmButtonText: 'Corregir',
        background: document.documentElement.classList.contains('dark') ? '#1F2937' : '#FFFFFF',
        color: document.documentElement.classList.contains('dark') ? '#F9FAFB' : '#111827',
        showClass: {
            popup: 'animate__animated animate__shakeX'
        }
    });
@endif
</script>

{{-- Estilos adicionales para animaciones --}}
<style>
@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.8s ease-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-10px); }
    75% { transform: translateX(10px); }
}

.animate-shake {
    animation: shake 0.5s ease-in-out;
}

/* Efecto de hover para el formulario */
form:hover {
    transform: translateY(-2px);
}

/* Animación de delay para efectos de luz */
.delay-1000 {
    animation-delay: 1s;
}

/* Sombras personalizadas */
.shadow-3xl {
    box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
}

/* Transiciones suaves para tema oscuro */
* {
    transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}

/* Mejora del select en dark mode */
select option {
    background-color: white;
    color: black;
}

.dark select option {
    background-color: #1F2937;
    color: white;
}
</style>

{{-- Animate.css para SweetAlert2 (opcional pero recomendado) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

@endsection