<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PenanamanController;

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

// Form Penanaman
Route::get('/form-penanaman', [PenanamanController::class, 'create'])->name('penanaman.create');
Route::post('/form-penanaman', [PenanamanController::class, 'store'])->name('penanaman.store');
Route::get('/penanaman', [PenanamanController::class, 'index'])->name('penanaman.index');
Route::get('/penanaman/{id}', [PenanamanController::class, 'show'])->name('penanaman.show');


// Form Pendapatan
Route::get('/form-pendapatan', [PendapatanController::class, 'create'])->name('pendapatan.create');
Route::post('/form-pendapatan', [PendapatanController::class, 'store'])->name('pendapatan.store');


