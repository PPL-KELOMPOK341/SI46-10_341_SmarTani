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
use App\Http\Controllers\Admin\Auth\AdminLoginController;

/*
|-----------------------------------------------------------
| Web Routes
|-----------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// ============================
// Login Routes (Guest Only)
// ============================
Route::middleware('guest')->group(function () {
    // Login Admin
    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    // Login User
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

// ============================
// Admin Routes (Role: Admin)
// ============================
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    // Admin Dashboard (home)
    Route::get('/home', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
    
    // Tambahkan rute admin lainnya jika diperlukan
});

// Admin Logout Route (di luar prefix karena redirect setelah login bisa beda)
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// ============================
// User Routes (Role: User)
// ============================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BeritaController::class, 'index'])->name('dashboard');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Penanaman Routes
    Route::prefix('penanaman')->group(function () {
        Route::get('/form', [PenanamanController::class, 'create'])->name('penanaman.create');
        Route::post('/form', [PenanamanController::class, 'store'])->name('penanaman.store');
        Route::get('/riwayat', [PenanamanController::class, 'index'])->name('penanaman.index');
        Route::get('/form/hasil/{id}', [PenanamanController::class, 'hasilForm'])->name('penanaman.hasil-form');
        Route::get('/riwayat/detail/{id}', [PenanamanController::class, 'lihatDetail'])->name('penanaman.lihat-detail');
        Route::get('/{id}/edit', [PenanamanController::class, 'edit'])->name('penanaman.edit');
        Route::put('/{id}', [PenanamanController::class, 'update'])->name('penanaman.update');
        Route::delete('/{id}', [PenanamanController::class, 'destroy'])->name('penanaman.destroy');
    });

    // Hasil Panen Routes
    Route::prefix('hasil-panen')->group(function () {
        Route::get('/', [HasilPanenController::class, 'index'])->name('hasil-panen.index');
        Route::get('/create', [HasilPanenController::class, 'create'])->name('hasil-panen.create');
        Route::post('/store', [HasilPanenController::class, 'store'])->name('hasil-panen.store');
        Route::get('/{id}', [HasilPanenController::class, 'show'])->name('hasil-panen.show');
        Route::get('/{id}/edit', [HasilPanenController::class, 'edit'])->name('hasil-panen.edit');
        Route::put('/{id}', [HasilPanenController::class, 'update'])->name('hasil-panen.update');
        Route::delete('/{id}', [HasilPanenController::class, 'destroy'])->name('hasil-panen.destroy');
    });

    // Pengeluaran Routes
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::post('pengeluaran/search', [PengeluaranController::class, 'search'])->name('pengeluaran.search');

    // Pendapatan Routes
    Route::prefix('pendapatan')->group(function () {
        Route::get('/form', [PendapatanController::class, 'create'])->name('pendapatan.create');
        Route::post('/form', [PendapatanController::class, 'store'])->name('pendapatan.store');
        Route::get('/riwayat', [PendapatanController::class, 'index'])->name('riwayat_pendapatan.index');
        Route::get('/{id}', [PendapatanController::class, 'show'])->name('pendapatan.show');
        Route::get('/{id}/print', [PendapatanController::class, 'print'])->name('pendapatan.print');
        Route::get('/{id}/edit', [PendapatanController::class, 'edit'])->name('pendapatan.edit');
        Route::put('/{id}', [PendapatanController::class, 'update'])->name('pendapatan.update');
        Route::delete('/{id}', [PendapatanController::class, 'destroy'])->name('pendapatan.destroy');
    });

    // Pencatatan Manual
    Route::get('/form-pencatatan', function () {
        return view('form-pencatatan');
    })->name('form-pencatatan');
});

// ============================
// Fortify Auth Routes
// ============================
require __DIR__ . '/auth.php';
