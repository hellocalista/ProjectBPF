<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login/{role?}', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register/{role}', [AuthController::class, 'showRegister'])
        ->whereIn('role', ['worker', 'company'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
