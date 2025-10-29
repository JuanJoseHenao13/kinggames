@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-black relative overflow-hidden">
    
    <!-- 🎮 Fondo matriz gaming -->
    <div class="absolute inset-0 bg-gradient-to-br from-purple-950 via-black to-cyan-950"></div>
    
    <!-- Grid animado -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(0,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(0,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px; animation: gridMove 20s linear infinite;"></div>
    </div>
    
    <!-- Partículas flotantes -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- 🎮 Controles flotantes animados -->
    <div class="absolute top-20 left-10 animate-float">
        <svg width="80" height="80" viewBox="0 0 100 100" class="opacity-30">
            <circle cx="50" cy="50" r="40" fill="none" stroke="url(#grad1)" stroke-width="3"/>
            <circle cx="50" cy="50" r="35" fill="rgba(139,92,246,0.2)"/>
            <circle cx="50" cy="30" r="8" fill="#8b5cf6" class="animate-pulse"/>
            <circle cx="70" cy="50" r="8" fill="#06b6d4" class="animate-pulse" style="animation-delay: 0.2s"/>
            <circle cx="50" cy="70" r="8" fill="#f59e0b" class="animate-pulse" style="animation-delay: 0.4s"/>
            <circle cx="30" cy="50" r="8" fill="#10b981" class="animate-pulse" style="animation-delay: 0.6s"/>
            <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#8b5cf6;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#06b6d4;stop-opacity:1" />
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="absolute bottom-24 right-16 animate-float-delayed">
        <svg width="100" height="60" viewBox="0 0 120 80" class="opacity-30">
            <rect x="10" y="20" width="100" height="40" rx="20" fill="rgba(6,182,212,0.2)" stroke="#06b6d4" stroke-width="2"/>
            <rect x="25" y="10" width="25" height="25" rx="5" fill="#8b5cf6" class="animate-pulse"/>
            <rect x="70" y="10" width="25" height="25" rx="5" fill="#06b6d4" class="animate-pulse" style="animation-delay: 0.3s"/>
            <circle cx="30" cy="50" r="6" fill="#f59e0b"/>
            <circle cx="50" cy="50" r="6" fill="#10b981"/>
        </svg>
    </div>

    <!-- Elementos decorativos -->
    <div class="absolute top-40 right-20 w-32 h-32 bg-purple-600/20 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-40 left-20 w-40 h-40 bg-cyan-500/20 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s"></div>

    <!-- 💎 Contenedor principal -->
    <div class="max-w-md w-full mx-4 relative z-20">
        <!-- Efecto glow exterior -->
        <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 via-cyan-500 to-purple-600 rounded-3xl blur opacity-30 animate-pulse-glow"></div>
        
        <div class="relative bg-slate-900/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-purple-500/30 overflow-hidden">
            
            <!-- Header con efecto holográfico -->
            <div class="relative text-center py-10 px-8 border-b border-purple-500/30 bg-gradient-to-b from-purple-900/30 to-transparent">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-purple-500/10 to-transparent animate-shimmer"></div>
                
                <div class="relative mx-auto h-20 w-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-purple-600 to-cyan-600 shadow-lg shadow-purple-500/50 mb-6 animate-pulse-slow">
                    <i class="bi bi-controller text-4xl text-white"></i>
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-transparent to-white/20"></div>
                </div>
                
                <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-cyan-400 to-purple-400 animate-gradient mb-2">
                    KingGames LOGIN
                </h2>
                <p class="text-cyan-400 text-sm font-semibold tracking-wider">
                    → Inica el Juego ←
                </p>
            </div>

            <!-- Formulario -->
            <div class="p-8 space-y-6">
                <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                    @csrf

                    <!-- Email con efecto neon -->
                    <div class="relative group">
                        <label for="email" class="block text-xs font-bold text-purple-400 uppercase tracking-wider mb-2">
                            <i class="bi bi-envelope-fill mr-1"></i>Email 
                        </label>
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-cyan-600 rounded-xl blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                   class="relative w-full px-4 py-3 bg-slate-800/80 border-2 border-purple-500/50 rounded-xl text-white placeholder-gray-500 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/50 transition-all duration-300 font-medium"
                                   placeholder="player@gaming.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-400 font-medium animate-shake">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password con efecto neon -->
                    <div class="relative group">
                        <label for="password" class="block text-xs font-bold text-purple-400 uppercase tracking-wider mb-2">
                            <i class="bi bi-lock-fill mr-1"></i>Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-cyan-600 rounded-xl blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                   class="relative w-full px-4 py-3 bg-slate-800/80 border-2 border-purple-500/50 rounded-xl text-white placeholder-gray-500 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/50 transition-all duration-300 font-medium"
                                   placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-400 font-medium animate-shake">⚠ {{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Opciones -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center text-gray-300 hover:text-white transition-colors cursor-pointer">
                            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-purple-600 rounded border-purple-500 bg-slate-800 focus:ring-purple-500 focus:ring-offset-slate-900">
                            <span class="ml-2 font-medium">Remember Me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="font-bold text-cyan-400 hover:text-cyan-300 transition-colors">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <!-- Botón START GAME -->
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 via-cyan-500 to-purple-600 rounded-xl blur opacity-50 group-hover:opacity-100 transition-opacity duration-300 animate-pulse-glow"></div>
                        <button type="submit" 
                            class="relative w-full py-4 px-6 bg-gradient-to-r from-purple-600 via-cyan-600 to-purple-600 text-white font-black text-lg rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-cyan-400 transition-all duration-300 uppercase tracking-wider">
                            <span class="flex items-center justify-center">
                                <i class="bi bi-joystick mr-2 text-xl"></i>
                                INICIAR EL JUEGO
                                <i class="bi bi-arrow-right-circle ml-2 text-xl"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer con efecto tech -->
            <div class="px-8 py-5 bg-gradient-to-r from-purple-900/30 to-cyan-900/30 text-center text-sm border-t border-purple-500/30">
                <p class="text-gray-400 font-medium">
                    New Player? 
                    <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300 font-bold transition-colors ml-1">
                        CREA TU CUENTA
                    </a>
                </p>
            </div>

            <!-- Línea de scaneo -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="scan-line"></div>
            </div>
        </div>
    </div>
</div>

<style>
/* Animaciones de fondo */
@keyframes gridMove {
  0% { transform: translateY(0); }
  100% { transform: translateY(50px); }
}

/* Partículas */
.particle {
  position: absolute;
  width: 4px;
  height: 4px;
  background: linear-gradient(45deg, #8b5cf6, #06b6d4);
  border-radius: 50%;
  animation: particleFloat 15s infinite ease-in-out;
  opacity: 0.6;
}

.particle:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; animation-duration: 20s; }
.particle:nth-child(2) { top: 20%; left: 80%; animation-delay: 2s; animation-duration: 18s; }
.particle:nth-child(3) { top: 60%; left: 20%; animation-delay: 4s; animation-duration: 22s; }
.particle:nth-child(4) { top: 80%; left: 70%; animation-delay: 1s; animation-duration: 19s; }
.particle:nth-child(5) { top: 40%; left: 50%; animation-delay: 3s; animation-duration: 21s; }
.particle:nth-child(6) { top: 70%; left: 90%; animation-delay: 5s; animation-duration: 17s; }
.particle:nth-child(7) { top: 30%; left: 40%; animation-delay: 2.5s; animation-duration: 20s; }
.particle:nth-child(8) { top: 50%; left: 15%; animation-delay: 4.5s; animation-duration: 18s; }

@keyframes particleFloat {
  0%, 100% { transform: translateY(0) translateX(0) scale(1); opacity: 0.6; }
  25% { transform: translateY(-100px) translateX(50px) scale(1.5); opacity: 0.8; }
  50% { transform: translateY(-50px) translateX(-80px) scale(1); opacity: 0.4; }
  75% { transform: translateY(-120px) translateX(30px) scale(1.3); opacity: 0.7; }
}

/* Flotación de controles */
@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(5deg); }
}

@keyframes floatDelayed {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  50% { transform: translateY(-30px) rotate(-5deg); }
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
  animation: floatDelayed 8s ease-in-out infinite;
}

/* Pulso suave */
.animate-pulse-slow {
  animation: pulseSlow 4s ease-in-out infinite;
}

@keyframes pulseSlow {
  0%, 100% { opacity: 0.3; transform: scale(1); }
  50% { opacity: 0.6; transform: scale(1.05); }
}

/* Efecto gradient animado */
@keyframes gradient {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}

.animate-gradient {
  background-size: 200% auto;
  animation: gradient 3s ease infinite;
}

/* Shimmer effect */
@keyframes shimmer {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}

.animate-shimmer {
  animation: shimmer 3s infinite;
}

/* Pulse glow */
@keyframes pulseGlow {
  0%, 100% { opacity: 0.5; }
  50% { opacity: 1; }
}

.animate-pulse-glow {
  animation: pulseGlow 2s ease-in-out infinite;
}

/* Scan line */
.scan-line {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, transparent, #06b6d4, transparent);
  animation: scan 4s linear infinite;
  opacity: 0.5;
}

@keyframes scan {
  0% { transform: translateY(0); }
  100% { transform: translateY(600px); }
}

/* Shake animation para errores */
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-10px); }
  75% { transform: translateX(10px); }
}

.animate-shake {
  animation: shake 0.5s ease-in-out;
}
</style>
@endsection