<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/', HomeController::class)->name('home.index');
});

// register and logout routes
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/series/{id}', [SerieController::class, 'show'])->name('serie.show');

Route::get('/mymovies', [MovieController::class, 'index'])->name('movie.index');
Route::get('/myseries', [SerieController::class, 'index'])->name('series.index');