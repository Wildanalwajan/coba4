<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function(){
    return view('landing');
});

// Halaman Login & Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-proses', [AuthController::class, 'register_proses'])->name('register.proses');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin (Hanya admin)
Route::middleware(['ceklevel:admin'])->group(function () {
    Route::get('/admin', [AuthController::class, 'admindashboard'])->name('admin.dashboard');
});

// Dashboard User (Hanya user)
Route::middleware(['ceklevel:user'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});
