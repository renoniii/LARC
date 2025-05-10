<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CarritoController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('inicio');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('producto.detalle'); 

Route::post('/carrito/agregar/{id}', [ProductoController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/disminuir/{id}', [CarritoController::class, 'disminuir'])->name('carrito.disminuir');
Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');

/*
|--------------------------------------------------------------------------
| Dashboard (privado)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'admin'])->name('dashboard');

Route::get('/dashboard/productos', function () {
    return view('dashboard.productos');
})->middleware(['auth', 'admin'])->name('dashboard.productos');

Route::get('/dashboard/usuarios', function () {
    return view('dashboard.usuarios');
})->middleware(['auth', 'admin'])->name('dashboard.usuarios');

Route::get('/dashboard/mensajes', function () {
    return view('dashboard.mensajes');
})->middleware(['auth', 'admin'])->name('dashboard.mensajes');

Route::get('/dashboard/categorias', function () {
    return view('dashboard.categorias');
})->middleware(['auth', 'admin'])->name('dashboard.categorias');

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

Auth::routes(['verify' => true]); // habilita verificación de email

