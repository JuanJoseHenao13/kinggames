<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - KinGGameS')</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
    <div class="min-h-full">
        <!-- Sidebar -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 px-6 pb-4">
                <!-- Logo -->
                <div class="flex h-16 shrink-0 items-center border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">⚡ KinGGameS</h1>
                </div>
                <!-- Navigation -->
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="{{ route('cliente.dashboard') }}"
                                       class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('cliente.dashboard') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="bi bi-speedometer2 h-6 w-6 shrink-0"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cliente.productos.index') }}"
                                       class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('cliente.productos.index') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="bi bi-controller h-6 w-6 shrink-0"></i>
                                        Productos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cliente.cart.index') }}"
                                       class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('cliente.cart.index') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}"
                                       id="cart-link">
                                        <i class="bi bi-cart-fill h-6 w-6 shrink-0"></i>
                                        Carrito
                                        <span id="cart-count-badge" class="ml-auto inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium bg-red-500 text-white rounded-full">
                                            {{ \Cart::getTotalQuantity() ?? 0 }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cliente.transacciones.index') }}"
                                       class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('cliente.transacciones.index') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-300 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
                                        <i class="bi bi-receipt h-6 w-6 shrink-0"></i>
                                        Mis Compras
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Main content -->
        <div class="lg:pl-72">
            <!-- Top bar -->
            <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <div class="flex flex-1 items-center">
                        <h1 class="text-lg font-semibold leading-6 text-gray-900 dark:text-white">
                            @yield('page-title', 'Cliente Dashboard')
                        </h1>
                    </div>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">
                        <!-- Dark mode toggle -->
                        <button type="button" id="dark-mode-toggle"
                                class="p-2 text-gray-400 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <span class="sr-only">Cambiar modo</span>
                            <i class="bi bi-sun-fill h-5 w-5 hidden dark:block"></i>
                            <i class="bi bi-moon-fill h-5 w-5 block dark:hidden"></i>
                        </button>
                        <!-- Back to site -->
                        <a href="{{ route('cliente.dashboard') }}"
                           class="inline-flex items-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            <i class="bi bi-house-fill -ml-0.5 h-4 w-4"></i>
                            Sitio
                        </a>
                        <!-- Logout -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="inline-flex items-center gap-x-1.5 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                <i class="bi bi-box-arrow-right -ml-0.5 h-4 w-4"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Page content -->
            <main class="py-8">
                <div class="px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Dark mode toggle
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const html = document.documentElement;
        const currentTheme = localStorage.getItem('theme') || 'dark';
        html.classList.toggle('dark', currentTheme === 'dark');
        darkModeToggle?.addEventListener('click', () => {
            const isDark = html.classList.contains('dark');
            html.classList.toggle('dark', !isDark);
            localStorage.setItem('theme', !isDark ? 'dark' : 'light');
        });
    </script>
    @yield('js')
</body>
</html>
