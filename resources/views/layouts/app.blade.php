<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KinGGameS - Tienda de Videojuegos')</title>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">⚡ KinGGameS</h1>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-blue-500 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' }} text-sm font-medium transition-colors">
                        <i class="bi bi-house-fill mr-2"></i>
                        Inicio
                    </a>
                    <a href="{{ route('productos.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('productos.*') ? 'border-blue-500 text-gray-900 dark:text-white' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600' }} text-sm font-medium transition-colors">
                        <i class="bi bi-controller mr-2"></i>
                        Productos
                    </a>
                </div>

                <!-- Right side -->
                <div class="flex items-center space-x-4">
                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" 
                       class="relative p-2 text-gray-400 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <span class="sr-only">Carrito</span>
                        <i class="bi bi-cart-fill h-6 w-6"></i>
                        @if(isset($cartCount) && $cartCount > 0)
                            <span class="absolute -top-1 -right-1 h-5 w-5 rounded-full bg-red-500 flex items-center justify-center text-xs font-medium text-white">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Auth Links -->
                    @guest
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <i class="bi bi-box-arrow-in-right mr-2"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <i class="bi bi-person-plus mr-2"></i>
                            Registro
                        </a>
                    @else
                        <!-- Admin Panel Link -->
                        @if(auth()->user()->rol === 'admin')
                            <a href="{{ route('admin.dashboard') }}" 
                               class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                                <i class="bi bi-gear-fill mr-2"></i>
                                Admin
                            </a>
                        @endif

                        <!-- Logout -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                <i class="bi bi-box-arrow-right mr-2"></i>
                                Logout
                            </button>
                        </form>
                    @endguest

                    <!-- Dark Mode Toggle -->
                    <button type="button" id="dark-mode-toggle" 
                            class="p-2 text-gray-400 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <span class="sr-only">Cambiar modo</span>
                        <i class="bi bi-sun-fill h-5 w-5 hidden dark:block"></i>
                        <i class="bi bi-moon-fill h-5 w-5 block dark:hidden"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 dark:bg-gray-900">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">⚡ KinGGameS</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Tu tienda de videojuegos de confianza
                </p>
                <div class="flex justify-center space-x-6 text-gray-400 dark:text-gray-500">
                    <a href="#" class="hover:text-gray-500 dark:hover:text-gray-400 transition-colors">
                        <i class="bi bi-shield-check mr-1"></i>
                        Términos
                    </a>
                    <a href="#" class="hover:text-gray-500 dark:hover:text-gray-400 transition-colors">
                        <i class="bi bi-lock-fill mr-1"></i>
                        Privacidad
                    </a>
                    <a href="#" class="hover:text-gray-500 dark:hover:text-gray-400 transition-colors">
                        <i class="bi bi-envelope-fill mr-1"></i>
                        Contacto
                    </a>
                </div>
                <div class="mt-6 text-sm text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} KinGGameS. Todos los derechos reservados.
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Dark mode functionality
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const html = document.documentElement;
        
        // Check for saved theme preference or default to 'dark' mode
        const currentTheme = localStorage.getItem('theme') || 'dark';
        html.classList.toggle('dark', currentTheme === 'dark');
        
        darkModeToggle?.addEventListener('click', () => {
            const isDark = html.classList.contains('dark');
            html.classList.toggle('dark', !isDark);
            localStorage.setItem('theme', !isDark ? 'dark' : 'light');
        });

        // Cart count update function
        window.updateCartCount = function(count) {
            const cartBadge = document.querySelector('.cart-badge');
            if (cartBadge) {
                cartBadge.textContent = count;
                cartBadge.style.display = count > 0 ? 'flex' : 'none';
            }
        };
    </script>
    @yield('js')
</body>
</html>
