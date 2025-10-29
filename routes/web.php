<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClienteDashboardController;
use App\Models\Proveedor;

// Ruta principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

// Rutas públicas
Route::get('/productos-public/{producto}', [ProductoController::class, 'showPublic'])->name('productos.show-public');
Route::post('/cart/add/{producto}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::patch('/cart/update/{producto}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{producto}', [CartController::class, 'remove'])->name('cart.remove');

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.auth');
    Route::get('/profile', [UsuarioController::class, 'profile'])->name('profile');

    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

// Rutas de administración
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('proveedores', ProveedorController::class)->parameters([
        'proveedores' => 'proveedor',
    ]);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('productos', ProductoController::class)->except(['index']);
    Route::resource('inventarios', InventarioController::class);
    Route::get('inventarios/create/{productoId}', [InventarioController::class, 'create'])->name('inventarios.create.with.product');
    Route::get('transacciones/search-usuarios', [TransaccionController::class, 'searchUsuarios'])->name('transacciones.search.usuarios');
    Route::get('transacciones/search-productos', [TransaccionController::class, 'searchProductos'])->name('transacciones.search.productos');
    Route::resource('transacciones', TransaccionController::class);
    Route::get('transacciones/{transaccion}/pdf', [TransaccionController::class, 'pdf'])->name('transacciones.pdf');
});

Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show.public');

Route::middleware(['auth', 'cliente'])->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('dashboard', [ClienteDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('productos/{producto}', [ProductoController::class, 'showCliente'])->name('productos.show');
    Route::get('carrito', [CartController::class, 'index'])->name('cart.index');
    Route::patch('carrito/update/{producto}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('carrito/remove/{producto}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('historial', [TransaccionController::class, 'index'])->name('transacciones.index');
    Route::get('historial/{transaccion}', [TransaccionController::class, 'show'])->name('transacciones.show');
    Route::get('historial/{transaccion}/pdf', [TransaccionController::class, 'exportPdf'])->name('transacciones.pdf');
    Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart.count');

    // Perfil cliente
    Route::get('perfil', [ClienteDashboardController::class, 'perfil'])->name('perfil');
    Route::post('perfil', [ClienteDashboardController::class, 'updatePerfil'])->name('perfil.update');
});
