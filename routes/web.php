<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenanamanController;
//use App\Http\Controllers\RiwayatPengeluaranController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('/riwayat-pengeluaran', [RiwayatPengeluaranController::class, 'index'])->name('riwayat.index');
//Route::get('/riwayat-pengeluaran/{id}', [RiwayatPengeluaranController::class, 'show'])->name('riwayat.show');

Route::get('/dashboard', [BeritaController::class, 'index'])->middleware('auth')->name('dashboard');

// Form Penanaman
Route::get('/form-penanaman', [PenanamanController::class, 'create'])->name('penanaman.create');
Route::post('/form-penanaman', [PenanamanController::class, 'store'])->name('penanaman.store');