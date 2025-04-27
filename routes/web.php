<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HasilPanenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Hasil Panen
    Route::get('/hasil-panen', [HasilPanenController::class, 'create'])->name('hasil-panen.create');
    Route::post('/hasil-panen/store', [HasilPanenController::class, 'store'])->name('hasil-panen.store');

});

require __DIR__.'/auth.php';

Route::get('/testing/navbar', function () {
    return view('testing.navbar-test');
});
// Register
// Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
// Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Form Pendapatan
// Route::get('/form-pendapatan', [PendapatanController::class, 'create'])->name('pendapatan.create');
// Route::post('/form-pendapatan', [PendapatanController::class, 'store'])->name('pendapatan.store');
// Route::post('/pendapatan/store', [PendapatanController::class, 'store'])->name('pendapatan.store');

// Riwayat Pengeluaran
// Route::get('/riwayat-pengeluaran', [RiwayatPengeluaranController::class, 'index'])->name('riwayat.index');
// Route::get('/riwayat-pengeluaran/{id}', [RiwayatPengeluaranController::class, 'show'])->name('riwayat.show');

// Dashboard (Berita)
// Route::get('/dashboard', [BeritaController::class, 'index'])->middleware('auth')->name('dashboard');

// Route::get('/form-hasil-panen', function () {
//     return view('form-hasil-panen');
// });

// Hasil Panen


