@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-black relative overflow-hidden py-10">
    
    <!-- 🎮 Fondo matriz gaming -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-950 via-black to-pink-950"></div>
    
    <!-- Grid animado hexagonal -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: linear-gradient(30deg, rgba(236,72,153,0.1) 1px, transparent 1px), linear-gradient(150deg, rgba(99,102,241,0.1) 1px, transparent 1px); background-size: 60px 60px; animation: gridMove 25s linear infinite;"></div>
    </div>
    
    <!-- Orbes de energía flotantes -->
    <div class="energy-orb orb-1"></div>
    <div class="energy-orb orb-2"></div>
    <div class="energy-orb orb-3"></div>
    <div class="energy-orb orb-4"></div>

    <!-- 🎮 Joystick animado izquierda -->
    <div class="absolute top-32 left-8 animate-joystick-left">
        <svg width="100" height="100" viewBox="0 0 120 120" class="opacity-40">
            <defs>
                <linearGradient id="joyGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#ec4899;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#6366f1;stop-opacity:1" />
                </linearGradient>
            </defs>
            <!-- Base -->
            <circle cx="60" cy="70" r="35" fill="rgba(99,102,241,0.2)" stroke="url(#joyGrad)" stroke-width="3"/>
            <!-- Stick -->
            <line x1="60" y1="70" x2="60" x2="40" stroke="#ec4899" stroke-width="4" stroke-linecap="round" class="animate-stick"/>
            <circle cx="60" cy="40" r="12" fill="#ec4899" class="animate-pulse"/>
            <!-- Botones -->
            <circle cx="90" cy="50" r="6" fill="#6366f1" class="animate-pulse" style="animation-delay: 0.2s"/>
            <circle cx="30" cy="50" r="6" fill="#8b5cf6" class="animate-pulse" style="animation-delay: 0.4s"/>
        </svg>
    </div>

    <!-- 🎮 Controlador derecha -->
    <div class="absolute bottom-20 right-10 animate-controller-float">
        <svg width="120" height="80" viewBox="0 0 140 90" class="opacity-40">
            <defs>
                <linearGradient id="ctrlGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#6366f1;stop-opacity:1" />
                    <stop offset="50%" style="stop-color:#8b5cf6;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#ec4899;stop-opacity:1" />
                </linearGradient>
            </defs>
            <rect x="15" y="25" width="110" height="45" rx="22" fill="rgba(139,92,246,0.2)" stroke="url(#ctrlGrad)" stroke-width="2"/>
            <circle cx="40" cy="47" r="8" fill="#ec4899" class="animate-pulse"/>
            <circle cx="100" cy="35" r="7" fill="#6366f1" class="animate-pulse" style="animation-delay: 0.15s"/>
            <circle cx="110" cy="47" r="7" fill="#8b5cf6" class="animate-pulse" style="animation-delay: 0.3s"/>
            <circle cx="100" cy="59" r="7" fill="#ec4899" class="animate-pulse" style="animation-delay: 0.45s"/>
        </svg>
    </div>

    <!-- Portal de éxito -->
    <div id="successPortal" class="hidden fixed inset-0 flex items-center justify-center z-50 bg-black/80 backdrop-blur-sm">
        <div class="relative">
            <div class="portal-ring"></div>
            <div class="portal-ring" style="animation-delay: 0.3s"></div>
            <div class="portal-ring" style="animation-delay: 0.6s"></div>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <div class="text-center animate-bounce-in">
                    <i class="bi bi-check-circle text-6xl text-emerald-400 mb-4"></i>
                    <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400 mb-2">
                        CUENTA CREADA!
                    </h2>
                    <p class="text-cyan-400 text-lg font-bold tracking-wider">→ CARGANDO EL GAME ←</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 💎 Contenedor principal -->
    <div class="max-w-lg w-full mx-4 relative z-20">
        <!-- Efecto glow exterior -->
        <div class="absolute -inset-1 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 rounded-3xl blur-xl opacity-40 animate-pulse-glow"></div>
        
        <div class="relative bg-slate-900/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-pink-500/40 overflow-hidden">
            
            <!-- Header holográfico -->
            <div class="relative text-center py-8 px-6 border-b border-pink-500/30 bg-gradient-to-b from-pink-900/20 to-transparent">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-pink-500/10 to-transparent animate-shimmer"></div>
                
                <div class="relative mx-auto h-20 w-20 flex items-center justify-center rounded-2xl bg-gradient-to-br from-pink-600 via-purple-600 to-indigo-600 shadow-lg shadow-pink-500/50 mb-4 animate-pulse-slow">
                    <i class="bi bi-person-plus-fill text-4xl text-white"></i>
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-transparent to-white/20"></div>
                </div>
                
                <h2 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400 animate-gradient mb-2">
                    CREA TU CUENTA
                </h2>
                <p class="text-pink-400 text-sm font-bold tracking-wider uppercase">
                    → Registrate para acceder a KingGames! ←
                </p>
            </div>

            <!-- Formulario -->
            <div class="p-6 space-y-4">
                <form id="registerForm" method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Grid de 2 columnas para nombre y apellidos -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Nombre -->
                        <div class="relative group">
                            <label class="block text-xs font-bold text-pink-400 uppercase tracking-wider mb-2">
                                <i class="fas fa-user mr-1"></i>NOMBRES
                            </label>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" required
                                       class="relative w-full px-3 py-2.5 bg-slate-800/80 border-2 border-pink-500/50 rounded-lg text-white text-sm placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 transition-all duration-300"
                                       placeholder="Player">
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="relative group">
                            <label class="block text-xs font-bold text-pink-400 uppercase tracking-wider mb-2">
                                <i class="fas fa-id-card mr-1"></i>APELLIDOS
                            </label>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                <input id="apellidos" name="apellidos" type="text" value="{{ old('apellidos') }}" required
                                       class="relative w-full px-3 py-2.5 bg-slate-800/80 border-2 border-pink-500/50 rounded-lg text-white text-sm placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 transition-all duration-300"
                                       placeholder="One">
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="relative group">
                        <label class="block text-xs font-bold text-pink-400 uppercase tracking-wider mb-2">
                            <i class="fas fa-envelope mr-1"></i>Email 
                        </label>
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-indigo-600 rounded-lg blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                   class="relative w-full px-3 py-2.5 bg-slate-800/80 border-2 border-pink-500/50 rounded-lg text-white text-sm placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 transition-all duration-300"
                                   placeholder="player@arena.gg">
                        </div>
                    </div>

                    <!-- Grid de 2 columnas para passwords -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="relative group">
                            <label class="block text-xs font-bold text-pink-400 uppercase tracking-wider mb-2">
                                <i class="fas fa-lock mr-1"></i>Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                <input id="password" name="password" type="password" required
                                       class="relative w-full px-3 py-2.5 bg-slate-800/80 border-2 border-pink-500/50 rounded-lg text-white text-sm placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 transition-all duration-300"
                                       placeholder="••••••••">
                            </div>
                        </div>

                        <!-- Confirmar -->
                        <div class="relative group">
                            <label class="block text-xs font-bold text-pink-400 uppercase tracking-wider mb-2">
                                <i class="fas fa-lock mr-1"></i>Confirmar
                            </label>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                <input id="password-confirm" name="password_confirmation" type="password" required
                                       class="relative w-full px-3 py-2.5 bg-slate-800/80 border-2 border-pink-500/50 rounded-lg text-white text-sm placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 transition-all duration-300"
                                       placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <!-- Grid de 2 columnas para teléfono y dirección -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Teléfono -->
                        <div class="relative group">
                            <label class="block text-xs font-bold text-pink-400 uppercase tracking-wider mb-2">
                                <i class="fas fa-phone mr-1"></i>telefono
                            </label>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                <input id="telefono" name="telefono" type="text" value="{{ old('telefono') }}"
                                       class="relative w-full px-3 py-2.5 bg-slate-800/80 border-2 border-pink-500/50 rounded-lg text-white text-sm placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 transition-all duration-300"
                                       placeholder="+57 123 4567">
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="relative group">
                            <label class="block text-xs font-bold text-pink-400 uppercase tracking-wider mb-2">
                                <i class="fas fa-map-marker-alt mr-1"></i>DIRECCION
                            </label>
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                                <input id="direccion" name="direccion" type="text" value="{{ old('direccion') }}"
                                       class="relative w-full px-3 py-2.5 bg-slate-800/80 border-2 border-pink-500/50 rounded-lg text-white text-sm placeholder-gray-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/50 transition-all duration-300"
                                       placeholder="Your location">
                            </div>
                        </div>
                    </div>

                    <!-- Botón JOIN GAME -->
                    <div class="relative group pt-2">
                        <div class="absolute -inset-1 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 rounded-xl blur-lg opacity-60 group-hover:opacity-100 transition-opacity duration-300 animate-pulse-glow"></div>
                        <button type="submit" 
                            class="relative w-full py-4 px-6 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 text-white font-black text-lg rounded-xl shadow-lg hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-pink-400 transition-all duration-300 uppercase tracking-wider">
                            <span class="flex items-center justify-center">
                                <i class="bi bi-lightning-charge-fill mr-2 text-xl animate-pulse"></i>
                                REGISATRATE
                                <i class="bi bi-arrow-right-circle-fill ml-2 text-xl"></i>
                            </span>
                        </button>
                    </div>

                    <p class="text-center text-sm text-gray-400 pt-2">
                        ya tienes cuenta?
                        <a href="{{ route('login') }}" class="text-pink-400 hover:text-pink-300 font-bold transition-colors ml-1">
                            LOGIN AQUI →
                        </a>
                    </p>
                </form>
            </div>

            <!-- Línea de scaneo -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="scan-line-register"></div>
            </div>
        </div>
    </div>
</div>

<style>
/* Animaciones de fondo */
@keyframes gridMove {
  0% { transform: translateY(0) translateX(0); }
  100% { transform: translateY(60px) translateX(60px); }
}

/* Orbes de energía */
.energy-orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(40px);
  animation: orbFloat 20s ease-in-out infinite;
}

.orb-1 {
  width: 200px;
  height: 200px;
  background: radial-gradient(circle, rgba(236,72,153,0.4), transparent);
  top: 10%;
  left: 10%;
  animation-delay: 0s;
}

.orb-2 {
  width: 250px;
  height: 250px;
  background: radial-gradient(circle, rgba(99,102,241,0.3), transparent);
  top: 60%;
  right: 15%;
  animation-delay: 5s;
}

.orb-3 {
  width: 180px;
  height: 180px;
  background: radial-gradient(circle, rgba(139,92,246,0.4), transparent);
  bottom: 15%;
  left: 20%;
  animation-delay: 10s;
}

.orb-4 {
  width: 220px;
  height: 220px;
  background: radial-gradient(circle, rgba(99,102,241,0.35), transparent);
  top: 40%;
  right: 30%;
  animation-delay: 15s;
}

@keyframes orbFloat {
  0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.6; }
  25% { transform: translate(50px, -50px) scale(1.1); opacity: 0.8; }
  50% { transform: translate(-30px, 50px) scale(0.9); opacity: 0.4; }
  75% { transform: translate(70px, 30px) scale(1.05); opacity: 0.7; }
}

/* Animación joystick */
@keyframes joystickLeft {
  0%, 100% { transform: translateY(0) rotate(-5deg); }
  50% { transform: translateY(-15px) rotate(5deg); }
}

.animate-joystick-left {
  animation: joystickLeft 4s ease-in-out infinite;
}

@keyframes stick {
  0%, 100% { transform: rotate(0deg); }
  25% { transform: rotate(-15deg); }
  75% { transform: rotate(15deg); }
}

.animate-stick {
  transform-origin: 60px 70px;
  animation: stick 3s ease-in-out infinite;
}

/* Animación controlador */
@keyframes controllerFloat {
  0%, 100% { transform: translateY(0) rotate(2deg); }
  50% { transform: translateY(-20px) rotate(-2deg); }
}

.animate-controller-float {
  animation: controllerFloat 5s ease-in-out infinite;
}

/* Portal de éxito */
.portal-ring {
  position: absolute;
  width: 200px;
  height: 200px;
  border: 4px solid;
  border-color: rgba(236,72,153,0.8);
  border-radius: 50%;
  animation: portalExpand 2s ease-out infinite;
  box-shadow: 0 0 30px rgba(236,72,153,0.6), inset 0 0 30px rgba(236,72,153,0.4);
}

@keyframes portalExpand {
  0% { 
    transform: scale(0.5) rotate(0deg); 
    opacity: 1; 
    border-color: rgba(236,72,153,0.8);
  }
  50% {
    border-color: rgba(139,92,246,0.8);
  }
  100% { 
    transform: scale(2.5) rotate(360deg); 
    opacity: 0; 
    border-color: rgba(99,102,241,0.8);
  }
}

@keyframes bounceIn {
  0% { transform: scale(0); opacity: 0; }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); opacity: 1; }
}

.animate-bounce-in {
  animation: bounceIn 0.6s ease-out 0.5s both;
}

/* Pulso suave */
.animate-pulse-slow {
  animation: pulseSlow 4s ease-in-out infinite;
}

@keyframes pulseSlow {
  0%, 100% { opacity: 0.4; transform: scale(1); }
  50% { opacity: 0.7; transform: scale(1.05); }
}

/* Gradient animado */
@keyframes gradient {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}

.animate-gradient {
  background-size: 200% auto;
  animation: gradient 3s ease infinite;
}

/* Shimmer */
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

/* Scan line registro */
.scan-line-register {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, transparent, #ec4899, #8b5cf6, #6366f1, transparent);
  animation: scanRegister 5s linear infinite;
  opacity: 0.6;
}

@keyframes scanRegister {
  0% { transform: translateY(0); }
  100% { transform: translateY(700px); }
}
</style>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const portal = document.getElementById('successPortal');
    portal.classList.remove('hidden');
    
    // Efecto de sonido simulado con vibración visual
    setTimeout(() => {
        this.submit();
    }, 2000);
});
</script>
@endsection