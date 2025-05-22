<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

// Home
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('inicio');
    Route::get('/home', 'index')->name('home');
});

// Productos
Route::controller(ProductoController::class)->group(function () {
    Route::get('/productos', 'index')->name('productos');
    Route::get('/productos/{id}', 'show')->name('producto.detalle');
});

// Carrito y checkout
Route::controller(CarritoController::class)->group(function () {
    Route::post('/carrito/agregar/{id}', 'agregar')->name('carrito.agregar');
    Route::get('/carrito', 'ver')->name('carrito.ver');
    Route::post('/carrito/disminuir/{id}', 'disminuir')->name('carrito.disminuir');
    Route::delete('/carrito/{id}', 'eliminar')->name('carrito.eliminar');

    Route::middleware('auth')->group(function () {
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/checkout', 'procesarCheckout')->name('checkout.procesar');
    });
});

// Órdenes
Route::get('/mis-pedidos', [OrdenController::class, 'index'])->name('ordenes.index');

// Páginas informativas
Route::controller(NosotrosController::class)->group(function () {
    Route::get('/nosotros', 'index')->name('nosotros');
});

Route::controller(ContactoController::class)->group(function () {
    Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
    Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');
});

/*
|--------------------------------------------------------------------------
| Dashboard (privado)
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    // Panel principal
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Productos
    Route::prefix('productos')->group(function () {
        Route::get('/', [DashboardController::class, 'productos'])->name('dashboard.productos'); // <- este
        Route::get('/crear', [DashboardController::class, 'crearProducto'])->name('dashboard.productos.crear');
        Route::post('/', [DashboardController::class, 'guardarProducto'])->name('dashboard.productos.guardar');
        Route::get('/{id}/editar', [DashboardController::class, 'editarProducto'])->name('dashboard.productos.editar');
        Route::put('/{id}', [DashboardController::class, 'actualizarProducto'])->name('dashboard.productos.actualizar');
        Route::delete('/{id}', [DashboardController::class, 'eliminarProducto'])->name('dashboard.productos.eliminar');
    });

    // Usuarios
    Route::get('/usuarios', [DashboardController::class, 'usuarios'])->name('dashboard.usuarios');

    // Ordenes
    Route::get('/orden', [DashboardController::class, 'ordenes'])->name('dashboard.orden');

    //mensajes
    Route::get('/dashboard/mensajes', [contactoController::class, 'verMensajes'])->name('dashboard.mensajes');

    // Categorías
    Route::prefix('categorias')->group(function () {
        Route::get('/', [DashboardController::class, 'categorias'])->name('dashboard.categorias');
        Route::get('/crear', [DashboardController::class, 'crearCategoria'])->name('dashboard.categorias.crear');
        Route::post('/', [DashboardController::class, 'guardarCategoria'])->name('dashboard.categorias.guardar');
        Route::get('/{id}/editar', [DashboardController::class, 'editarCategoria'])->name('dashboard.categorias.editar');
        Route::put('/{id}', [DashboardController::class, 'actualizarCategoria'])->name('dashboard.categorias.actualizar');
        Route::delete('/{id}', [DashboardController::class, 'eliminarCategoria'])->name('dashboard.categorias.eliminar');
        Route::put('/dashboard/usuarios/{id}/rol', [DashboardController::class, 'actualizarRol'])->name('dashboard.usuarios.actualizarRol');
    });
});

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

Auth::routes(['verify' => true]);