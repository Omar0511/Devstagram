<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

/**
 * ->name('register') en una ruta de Laravel tiene una función clave para nombrar rutas y facilitar su uso en todo el proyecto.
 * Sino la ponemos en la siguiente línea como aquí abajo, tomará la anterior, es decir; la que se encuentra en la línea anterior,
 * siempre y cuando ambas URLS se llamen iguales, tanto en el GET como en el POST, sino no va FUNCIONAR!!!
 * Al agregarlo, en los enlaces a href=, lo llamaremos con: {{ ruoute('register' ) }}
*/
Route::get('/register', [RegisterController::class, 'index'] )->name('register');
// Store: guardar, almacenar información
Route::post('/register', [RegisterController::class, 'store'] );

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/muro', [PostController::class, 'index'])->name('posts.index');
