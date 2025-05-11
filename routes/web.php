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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenanamanController;
use App\Http\Controllers\HasilPanenController;

    Route::get('/', function () {
    return view('welcome');
});

    Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Berita
    Route::get('/dashboard', [BeritaController::class, 'index'])->name('dashboard');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

    // Penanaman
    Route::get('/form-penanaman', [PenanamanController::class, 'create'])->name('penanaman.create');
    Route::post('/form-penanaman', [PenanamanController::class, 'store'])->name('penanaman.store');
    Route::get('/riwayat-penanaman', [PenanamanController::class, 'index'])->name('penanaman.index');
    Route::get('/form-penanaman/hasil/{id}', [PenanamanController::class, 'hasilForm'])->name('penanaman.hasil-form');
    Route::get('/riwayat-penanaman/detail/{id}', [PenanamanController::class, 'lihatDetail'])->name('penanaman.lihat-detail');
    Route::get('/penanaman/{id}/edit', [PenanamanController::class, 'edit'])->name('penanaman.edit');
    Route::put('/penanaman/{id}', [PenanamanController::class, 'update'])->name('penanaman.update');
    Route::delete('/penanaman/{id}', [PenanamanController::class, 'destroy'])->name('penanaman.destroy');

    // Hasil Panen
    Route::post('hasil-panen/search', [HasilPanenController::class, 'search'])->name('hasil-panen.search');
    Route::resource('hasil-panen', HasilPanenController::class);

    // Pengeluaran
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::post('pengeluaran/search', [PengeluaranController::class, 'search'])->name('pengeluaran.search');

    // Pendapatan
    Route::get('/form-pendapatan', [PendapatanController::class, 'create'])->name('pendapatan.create');
    Route::post('/form-pendapatan', [PendapatanController::class, 'store'])->name('pendapatan.store');
    Route::get('/riwayat_pendapatan', [PendapatanController::class, 'index'])->name('riwayat_pendapatan.index');
    Route::get('/pendapatan/{id}', [PendapatanController::class, 'show'])->name('pendapatan.show');
    Route::get('/pendapatan/{id}/print', [PendapatanController::class, 'print'])->name('pendapatan.print');

    Route::get('/pendapatan/{id}/edit', [PendapatanController::class, 'edit'])->name('pendapatan.edit');
    Route::put('/pendapatan/{id}', [PendapatanController::class, 'update'])->name('pendapatan.update');
    Route::delete('/pendapatan/{id}', [PendapatanController::class, 'destroy'])->name('pendapatan.destroy');
    
    Route::get('/form-pencatatan', function () {
        return view('form-pencatatan');
    })->name('form-pencatatan');

    
});

require __DIR__.'/auth.php';
