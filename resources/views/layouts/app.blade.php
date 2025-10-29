<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KinGGameS - Tienda de Videojuegos')</title>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .font-gaming { font-family: 'Orbitron', sans-serif; }
        .font-inter { font-family: 'Inter', sans-serif; }
        
        /* Gradient animations */
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .animated-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 25%, #06b6d4 50%, #0891b2 75%, #0e7490 100%);
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }
        
        .gaming-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #0891b2 100%);
        }
        
        .neon-border {
            box-shadow: 0 0 10px rgba(30, 64, 175, 0.5), 0 0 20px rgba(30, 64, 175, 0.3);
        }
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        /* Glassmorphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .dark .glass {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Glow effect on hover */
        .glow-on-hover {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .glow-on-hover:hover {
            box-shadow: 0 0 20px rgba(30, 64, 175, 0.6);
        }
        
        /* Cart badge pulse */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .cart-badge-pulse {
            animation: pulse 2s ease-in-out infinite;
        }
    </style>
</head>

<body class="h-full bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100 dark:from-gray-900 dark:via-blue-950 dark:to-gray-900 transition-all duration-300 font-inter">
    
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-blue-900/50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 hover-lift">
                        <div class="w-12 h-12 rounded-xl gaming-gradient flex items-center justify-center shadow-lg">
                            <i class="bi bi-controller text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-gaming font-black bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-700 bg-clip-text text-transparent">
                                KinGGameS
                            </h1>
                            <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Level Up Your Game</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('home') }}" 
                       class="group relative px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-300 {{ request()->routeIs('home') ? 'bg-gradient-to-r from-blue-600 to-cyan-600 text-white shadow-lg' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i class="bi bi-house-fill mr-2"></i>
                        Inicio
                        @if(request()->routeIs('home'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-blue-600 to-cyan-600"></span>
                        @endif
                    </a>
                    <a href="{{ route('productos.index') }}" 
                       class="group relative px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-300 {{ request()->routeIs('productos.*') ? 'bg-gradient-to-r from-blue-600 to-cyan-600 text-white shadow-lg' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800' }}">
                        <i class="bi bi-controller mr-2"></i>
                        Productos
                        @if(request()->routeIs('productos.*'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-blue-600 to-cyan-600"></span>
                        @endif
                    </a>
                </div>

                <!-- Right side -->
                <div class="flex items-center space-x-3">
                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" 
                       class="relative p-3 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-all duration-300 hover-lift group">
                        <i class="bi bi-cart-fill text-xl group-hover:scale-110 transition-transform duration-300 inline-block"></i>
                        @if(isset($cartCount) && $cartCount > 0)
                            <span class="cart-badge absolute -top-1 -right-1 h-6 w-6 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center text-xs font-bold text-white shadow-lg cart-badge-pulse">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Auth Links -->
                    @guest
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift glow-on-hover">
                            <i class="bi bi-box-arrow-in-right mr-2"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-5 py-2.5 rounded-xl text-sm font-bold text-blue-600 dark:text-cyan-400 bg-white dark:bg-gray-800 border-2 border-blue-600 dark:border-cyan-400 hover:bg-blue-50 dark:hover:bg-gray-700 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift">
                            <i class="bi bi-person-plus mr-2"></i>
                            Registro
                        </a>
                    @else
                        <!-- Admin Panel Link -->
                        @if(auth()->user()->rol === 'admin')
                            <a href="{{ route('admin.dashboard') }}" 
                               class="inline-flex items-center px-4 py-2.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift">
                                <i class="bi bi-gear-fill mr-2"></i>
                                Admin
                            </a>
                        @endif

                        <!-- User Info & Logout -->
                        <div class="flex items-center space-x-2">
                            <span class="hidden lg:block px-3 py-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <i class="bi bi-person-circle mr-1"></i>
                                {{ auth()->user()->name }}
                            </span>
                            <form action="{{ route('logout') }}" method="POST" class="inline" id="logout-form">
                                @csrf
                            </form>
                            <button type="button" onclick="confirmLogout(event)"
                                    class="inline-flex items-center px-4 py-2.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift">
                                <i class="bi bi-box-arrow-right mr-2"></i>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </div>
                    @endguest

                    <!-- Dark Mode Toggle -->
                    <button type="button" id="dark-mode-toggle" 
                            class="p-3 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-yellow-100 dark:hover:bg-blue-900/30 transition-all duration-300 hover-lift group">
                        <i class="bi bi-sun-fill text-xl hidden dark:block group-hover:rotate-180 transition-transform duration-500"></i>
                        <i class="bi bi-moon-fill text-xl block dark:hidden group-hover:-rotate-12 transition-transform duration-300"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative mt-20 bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 text-white">
        <!-- Decorative top border -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-700"></div>
        
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-cyan-600 flex items-center justify-center shadow-2xl">
                        <i class="bi bi-controller text-white text-3xl"></i>
                    </div>
                </div>
                
                <h2 class="text-3xl font-gaming font-black bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-500 bg-clip-text text-transparent mb-3">
                    KinGGameS
                </h2>
                
                <p class="text-gray-300 mb-8 text-lg font-medium">
                    🎮 Tu tienda de videojuegos de confianza · Level Up Your Game 🚀
                </p>
                
                <!-- Social Links -->
                <div class="flex justify-center space-x-6 mb-8">
                    <a href="#" class="w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center transition-all duration-300 hover-lift glow-on-hover">
                        <i class="bi bi-twitter text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center transition-all duration-300 hover-lift glow-on-hover">
                        <i class="bi bi-discord text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center transition-all duration-300 hover-lift glow-on-hover">
                        <i class="bi bi-instagram text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center transition-all duration-300 hover-lift glow-on-hover">
                        <i class="bi bi-youtube text-xl"></i>
                    </a>
                </div>
                
                <!-- Footer Links -->
                <div class="flex flex-wrap justify-center gap-8 text-gray-300 mb-8">
                    <a href="#" class="hover:text-white transition-colors duration-300 font-medium group">
                        <i class="bi bi-shield-check mr-2 group-hover:scale-110 inline-block transition-transform"></i>
                        Términos de Servicio
                    </a>
                    <a href="#" class="hover:text-white transition-colors duration-300 font-medium group">
                        <i class="bi bi-lock-fill mr-2 group-hover:scale-110 inline-block transition-transform"></i>
                        Política de Privacidad
                    </a>
                    <a href="#" class="hover:text-white transition-colors duration-300 font-medium group">
                        <i class="bi bi-envelope-fill mr-2 group-hover:scale-110 inline-block transition-transform"></i>
                        Contacto
                    </a>
                    <a href="#" class="hover:text-white transition-colors duration-300 font-medium group">
                        <i class="bi bi-headset mr-2 group-hover:scale-110 inline-block transition-transform"></i>
                        Soporte
                    </a>
                </div>
                
                <!-- Copyright -->
                <div class="pt-8 border-t border-white/10">
                    <p class="text-gray-400 text-sm">
                        © {{ date('Y') }} <span class="font-gaming font-bold text-cyan-400">KinGGameS</span>. Todos los derechos reservados.
                    </p>
                    <p class="text-gray-500 text-xs mt-2">
                        Hecho con <i class="bi bi-heart-fill text-red-500"></i> para gamers
                    </p>
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

        // Welcome notification
        @if(session('welcome_user'))
            Swal.fire({
                title: '¡Bienvenido a KinGGameS!',
                text: 'Hola {{ session("welcome_user") }}, ¡disfruta de tu experiencia gaming!',
                icon: 'success',
                confirmButtonColor: '#10b981',
                background: '#ffffff',
                color: '#000000',
                customClass: {
                    popup: 'rounded-2xl shadow-2xl',
                    confirmButton: 'px-6 py-3 rounded-xl font-bold'
                }
            });
            @php
                session()->forget('welcome_user');
            @endphp
        @endif
    </script>

    <script>
        function confirmLogout(event) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro que quieres cerrar sesión?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Sí, cerrar sesión',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-xl shadow-2xl',
                    confirmButton: 'px-6 py-3 rounded-xl font-bold',
                    cancelButton: 'px-6 py-3 rounded-xl font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
