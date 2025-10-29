@extends('layouts.admin')

@section('page-title', 'Detalles del Usuario')

@section('content')
<div class="space-y-8">
    <!-- Header mejorado con iconos SVG y mejor diseño -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 dark:from-blue-400 dark:via-indigo-400 dark:to-purple-400 bg-clip-text text-transparent">
                Detalles del Usuario
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">Información completa del usuario</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('usuarios.edit', $usuario) }}" 
               class="group relative bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-blue-600 hover:via-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-blue-500/50 active:scale-95 overflow-hidden">
                <span class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                <span class="relative flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>Editar</span>
                </span>
            </a>
            <a href="{{ route('usuarios.index') }}" 
               class="group relative bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 text-white font-semibold py-3 px-6 rounded-xl hover:from-gray-600 hover:via-gray-700 hover:to-gray-800 transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-gray-500/50 active:scale-95 overflow-hidden">
                <span class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                <span class="relative flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Volver</span>
                </span>
            </a>
        </div>
    </div>

    <!-- Card de información mejorada con mejor diseño y iconos SVG -->
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden border border-gray-200 dark:border-gray-700 hover:shadow-blue-500/10 transition-shadow duration-300">
        <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-800 dark:via-gray-800 dark:to-gray-800">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">
                    Información del Usuario
                </h2>
            </div>
        </div>
        <div class="p-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Información Personal con iconos mejorados -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b-2 border-gradient-to-r from-blue-500 to-indigo-500">
                        <div class="p-2 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Información Personal</h3>
                    </div>

                    <div class="space-y-5">
                        <div class="group p-4 rounded-xl bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800/50 dark:to-blue-900/10 hover:shadow-md transition-all duration-300">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                ID de Usuario
                            </label>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $usuario->id_usuario }}</p>
                        </div>

                        <div class="group p-4 rounded-xl bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800/50 dark:to-blue-900/10 hover:shadow-md transition-all duration-300">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Nombre
                            </label>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $usuario->nombre }}</p>
                        </div>

                        <div class="group p-4 rounded-xl bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800/50 dark:to-blue-900/10 hover:shadow-md transition-all duration-300">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Apellidos
                            </label>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $usuario->apellidos }}</p>
                        </div>

                        <div class="group p-4 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 hover:shadow-md transition-all duration-300 border-2 border-blue-200 dark:border-blue-800">
                            <label class="flex items-center gap-2 text-sm font-medium text-blue-600 dark:text-blue-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Nombre Completo
                            </label>
                            <p class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">
                                {{ $usuario->nombre }} {{ $usuario->apellidos }}
                            </p>
                        </div>

                       

                       
                    </div>
                </div>

                <!-- Información de Contacto con iconos mejorados -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 pb-3 border-b-2 border-gradient-to-r from-purple-500 to-pink-500">
                        <div class="p-2 bg-gradient-to-br from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Información de Contacto</h3>
                    </div>

                    <div class="space-y-5">
                        <div class="group p-4 rounded-xl bg-gradient-to-r from-gray-50 to-purple-50 dark:from-gray-800/50 dark:to-purple-900/10 hover:shadow-md transition-all duration-300">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Teléfono
                            </label>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">
                                @if($usuario->telefono)
                                    {{ $usuario->telefono }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500 italic font-normal">No especificado</span>
                                @endif
                            </p>
                        </div>

                             <div class="group p-4 rounded-xl bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800/50 dark:to-blue-900/10 hover:shadow-md transition-all duration-300">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Email
                            </label>
                            <p class="text-lg font-bold text-gray-900 dark:text-white break-all">{{ $usuario->email }}</p>
                        </div>
 <div class="group p-4 rounded-xl bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800/50 dark:to-blue-900/10 hover:shadow-md transition-all duration-300">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                                Rol
                            </label>
                            <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold rounded-xl shadow-lg {{ $usuario->rol == 'admin' ? 'bg-gradient-to-r from-red-500 via-red-600 to-pink-600 text-white shadow-red-500/50' : 'bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 text-white shadow-gray-500/50' }}">
                                @if($usuario->rol == 'admin')
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                @endif
                                <span class="uppercase tracking-wide">{{ $usuario->rol }}</span>
                            </span>
                        </div>
                        
                        <div class="group p-4 rounded-xl bg-gradient-to-r from-gray-50 to-purple-50 dark:from-gray-800/50 dark:to-purple-900/10 hover:shadow-md transition-all duration-300">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Dirección
                            </label>
                            <p class="text-lg font-bold text-gray-900 dark:text-white">
                                @if($usuario->direccion)
                                    {{ $usuario->direccion }}
                                @else
                                    <span class="text-gray-400 dark:text-gray-500 italic font-normal">No especificada</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información del Sistema mejorada con iconos y mejor diseño -->
            <div class="mt-8 pt-8 border-t-2 border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3 pb-4 mb-6 border-b-2 border-gradient-to-r from-green-500 to-emerald-500">
                    <div class="p-2 bg-gradient-to-br from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30 rounded-lg">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Información del Sistema</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="group p-5 rounded-xl bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 hover:shadow-lg transition-all duration-300 border border-blue-200 dark:border-blue-800">
                        <label class="flex items-center gap-2 text-sm font-medium text-blue-600 dark:text-blue-400 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Fecha de Creación
                        </label>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $usuario->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="group p-5 rounded-xl bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 hover:shadow-lg transition-all duration-300 border border-purple-200 dark:border-purple-800">
                        <label class="flex items-center gap-2 text-sm font-medium text-purple-600 dark:text-purple-400 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Última Actualización
                        </label>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="group p-5 rounded-xl bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 hover:shadow-lg transition-all duration-300 border border-green-200 dark:border-green-800">
                        <label class="flex items-center gap-2 text-sm font-medium text-green-600 dark:text-green-400 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Estado
                        </label>
                        <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold rounded-xl bg-gradient-to-r from-green-500 via-green-600 to-emerald-600 text-white shadow-lg shadow-green-500/50">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="3"/>
                            </svg>
                            <span>Activo</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de acciones mejorada con iconos SVG y mejor diseño -->
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-orange-50 via-red-50 to-pink-50 dark:from-gray-800 dark:via-gray-800 dark:to-gray-800">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold bg-gradient-to-r from-orange-600 to-red-600 dark:from-orange-400 dark:to-red-400 bg-clip-text text-transparent">
                    Acciones Disponibles
                </h2>
            </div>
        </div>
        <div class="p-8">
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('usuarios.edit', $usuario) }}" 
                   class="group relative bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-600 text-white font-semibold py-4 px-8 rounded-xl hover:from-blue-600 hover:via-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/50 active:scale-95 overflow-hidden">
                    <span class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                    <span class="relative flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Editar Usuario</span>
                    </span>
                </a>

                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="group relative bg-gradient-to-r from-red-500 via-red-600 to-pink-600 text-white font-semibold py-4 px-8 rounded-xl hover:from-red-600 hover:via-red-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-red-500/50 active:scale-95 overflow-hidden">
                        <span class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                        <span class="relative flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            <span>Eliminar Usuario</span>
                        </span>
                    </button>
                </form>

                <a href="{{ route('usuarios.index') }}" 
                   class="group relative bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 text-white font-semibold py-4 px-8 rounded-xl hover:from-gray-600 hover:via-gray-700 hover:to-gray-800 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-gray-500/50 active:scale-95 overflow-hidden">
                    <span class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                    <span class="relative flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Volver a la Lista</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
</script>
@endsection
@endsection
