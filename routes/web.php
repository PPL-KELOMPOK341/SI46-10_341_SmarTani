<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendapatanController;
//use App\Http\Controllers\RiwayatPengeluaranController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Form Pendaftaran
Route::get('/form-pendapatan', [PendapatanController::class, 'create'])->name('pendapatan.create');
Route::post('/form-pendapatan', [PendapatanController::class, 'store'])->name('pendapatan.store');
Route::post('/pendapatan/store', [PendapatanController::class, 'store'])->name('pendapatan.store');

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('/riwayat-pengeluaran', [RiwayatPengeluaranController::class, 'index'])->name('riwayat.index');
//Route::get('/riwayat-pengeluaran/{id}', [RiwayatPengeluaranController::class, 'show'])->name('riwayat.show');

Route::get('/dashboard', [BeritaController::class, 'index'])->middleware('auth')->name('dashboard');
