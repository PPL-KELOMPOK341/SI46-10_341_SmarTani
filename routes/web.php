<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengeluaranController;
use App\Models\Pengeluaran; // Impor model Pengeluaran

// Halaman utama langsung ke form pengeluaran
Route::get('/', [PengeluaranController::class, 'create'])->name('home');

// List data pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');

// Form input pengeluaran
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');

// Simpan data pengeluaran
Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');

// Halaman setelah berhasil disimpan
Route::get('/pengeluaran/success/{pengeluaran}', function (Pengeluaran $pengeluaran) {
    return view('pengeluaran.success', compact('pengeluaran'));
})->name('pengeluaran.success');
