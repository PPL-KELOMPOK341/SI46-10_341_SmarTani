<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
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
Route::get('/riwayat-panen', function () {
    return view('riwayat-panen');
});
Route::get('/riwayat-panen/{id}', function ($id) {
    // Contoh data dummy (ganti nanti dengan dari DB)
    $data = [
        'nama_tanaman' => 'Jahe',
        'periode' => 'Periode I',
        'tanggal_penanaman' => '15 Maret 2025',
        'lokasi' => 'Jl. Cimaung RT.001/RW.002',
        'harga_jual' => 'Rp 2.500',
        'tanggal_panen' => '14 Juli 2025',
        'jumlah' => '200 kg',
        'kualitas' => 'Bagus',
    ];
    return view('panen.show', compact('data'));
});