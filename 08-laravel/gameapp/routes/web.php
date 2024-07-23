<?php

// routes/web.php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta para la vista Welcome
Route::get('/', function () {
    return view('welcome');
});

// Ruta para la vista Catalogue
Route::get('/catalogue', function () {
    return view('catalogue');
})->name('catalogue');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
