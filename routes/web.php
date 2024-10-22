<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', HomeController::class)->name('home.index');
