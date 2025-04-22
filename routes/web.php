<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\RiwayatPengeluaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RiwayatPendapatanController;
use App\Http\Controllers\GrafikController;

Route::get('/', function () {
    return view('welcome');
});

// Register
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Form Pendapatan dengan middleware auth
Route::get('/form-pendapatan', [PendapatanController::class, 'create'])->middleware('auth')->name('pendapatan.create');
Route::post('/form-pendapatan', [PendapatanController::class, 'store'])->middleware('auth')->name('pendapatan.store');


// Riwayat Pengeluaran
Route::get('/riwayat-pengeluaran', [RiwayatPengeluaranController::class, 'index'])->name('riwayat.index');
Route::get('/riwayat-pengeluaran/{id}', [RiwayatPengeluaranController::class, 'show'])->name('riwayat.show');

// Dashboard (Berita)
Route::get('/dashboard', [BeritaController::class, 'index'])->middleware('auth')->name('dashboard');

//Grafik Pengeluaran
Route::get('/grafik-pengeluaran', [RiwayatPengeluaranController::class, 'grafikPengeluaran'])->name('grafik.pengeluaran');

//Grafik Gabungan
Route::get('/grafik-pemasukan-pengeluaran', [GrafikController::class, 'index'])->name('grafik.pemasukan-pengeluaran');

//Riwayat Pendapatan
Route::get('/riwayat-pendapatan', [RiwayatPendapatanController::class, 'index'])->name('riwayat.pendapatan');
