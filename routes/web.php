<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendapatanController;

Route::get('/', function () {
    return view('welcome');
});

// Registration
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Form Pendaftaran




Route::get('/form-pendapatan', [PendapatanController::class, 'create'])->name('pendapatan.create');
Route::post('/form-pendapatan', [PendapatanController::class, 'store'])->name('pendapatan.store');


