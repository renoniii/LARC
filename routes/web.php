<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\ContactoController;

Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/nosotros', [NosotrosController::class, 'index']);
Route::get('/contacto', [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'enviar']);


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard/productos', function () {
    return view('dashboard.productos');
})->name('dashboard.productos');

Route::get('/dashboard/usuarios', function () {
    return view('dashboard.usuarios');
})->name('dashboard.usuarios');

Route::get('/dashboard/mensajes', function () {
    return view('dashboard.mensajes');
})->name('dashboard.mensajes');

Route::get('/dashboard/categorias', function () {
    return view('dashboard.categorias');
})->name('dashboard.categorias');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);