<?php

// ubicacion: gameapp/routes/web.php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Ruta vista Welcome
Route::get('/', function () {
    return view('welcome');
});

// Ruta vista Catalogue
Route::get('/catalogue', function () {
    return view('catalogue');
})->name('catalogue');

// Ruta dashboard, protegida por autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de autenticación
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Ruta inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Ruta para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de perfil (protegidas por autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de usuarios (CRUD) protegidas por autenticación
    Route::resource('users', UserController::class);
});

// Cargar rutas de autenticación
require __DIR__.'/auth.php';
