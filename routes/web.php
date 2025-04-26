<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\RiwayatPengeluaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RiwayatPendapatanController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PengeluaranController;

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

// Pendapatan
Route::get('/form-pendapatan', [PendapatanController::class, 'create'])->middleware('auth')->name('pendapatan.create');
Route::post('/form-pendapatan', [PendapatanController::class, 'store'])->middleware('auth')->name('pendapatan.store');

// Riwayat Pengeluaran
Route::get('/riwayat-pengeluaran', [RiwayatPengeluaranController::class, 'index'])->name('riwayat.index');
Route::get('/riwayat-pengeluaran/{id}', [RiwayatPengeluaranController::class, 'show'])->name('riwayat.show');

// Dashboard (Berita)
Route::get('/dashboard', [BeritaController::class, 'index'])->middleware('auth')->name('dashboard');

// Grafik
Route::get('/grafik-pengeluaran', [RiwayatPengeluaranController::class, 'grafikPengeluaran'])->name('grafik.pengeluaran');
Route::get('/grafik-pemasukan-pengeluaran', [GrafikController::class, 'index'])->name('grafik.pemasukan-pengeluaran');

// Riwayat Pendapatan
Route::get('/riwayat-pendapatan', [RiwayatPendapatanController::class, 'index'])->name('riwayat.pendapatan');
Route::get('/riwayat-pendapatan/{id}', [RiwayatPendapatanController::class, 'show'])->name('riwayat.pendapatan.detail');
// Tambahan untuk edit, update, dan delete pendapatan
Route::get('/pendapatan/{id}/edit', [PendapatanController::class, 'edit'])->name('pendapatan.edit');
Route::put('/pendapatan/{id}', [PendapatanController::class, 'update'])->name('pendapatan.update');
Route::delete('/pendapatan/{id}', [PendapatanController::class, 'destroy'])->name('pendapatan.destroy');


// Pengeluaran
Route::get('/pengeluaran/form', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
Route::resource('pengeluaran', PengeluaranController::class)->except(['create', 'store']);