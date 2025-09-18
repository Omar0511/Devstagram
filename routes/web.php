<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
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

// Route::get('/muro', [PostController::class, 'index'])->name('posts.index');
// Route MOdule Binding
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

// Likes a las publicaciones
Route::post('/posts/{post}/likes', action: [LikeController::class, 'store'])->name('posts.like.store');
