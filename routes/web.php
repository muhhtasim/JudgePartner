<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'approved', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
