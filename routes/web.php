<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\RiwayatPengeluaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatPendapatanController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenanamanController;
use App\Http\Controllers\HasilPanenController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\SettingWebsiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController as UserControllerAlias;
use App\Http\Controllers\PengaduanController;
use App\Http\Middleware\RoleMiddleware;

// ============================
// Default Route
// ============================
Route::get('/', function () {
    return view('welcome');
});

// ============================
// Admin Authentication Routes
// ============================
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
});

// Admin Logout (separate from group for custom redirect)
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// ============================
// Admin Protected Routes
// ============================
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/beranda', [AdminController::class, 'index'])->name('admin.beranda');

    // Setting Website
    Route::get('/setting-website', [SettingWebsiteController::class, 'index'])->name('setting.website');
    Route::post('/setting-website', [SettingWebsiteController::class, 'store'])->name('setting.website.store');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('admin.pengaduan');
    // Route::get('/data-user', [UserController::class, 'index'])->name('admin.data-user');
});

// ============================
// User Authentication Routes
// ============================
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

// ============================
// User Protected Routes
// ============================
Route::middleware(['auth'])->group(function () {
    // Dashboard Berita
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
    
    // Pengaduan 
    Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');


    // Halaman tambahan
    Route::get('/form-pencatatan', function () {
        return view('form-pencatatan');
    })->name('form-pencatatan');

    Route::get('/grafik-pemasukan-pengeluaran', [\App\Http\Controllers\GrafikController::class, 'pemasukanPengeluaran'])->name('grafik.index');


    
    // 🟦 Route Khusus Role USER
    Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
        Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    });

    // 🟥 Route Khusus Role ADMIN Riwayat Pengaduan
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/admin/riwayat-pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.riwayat');
        Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
        Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
        Route::put('/pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
        Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    }); 

    // Redirect ke index berita
    Route::get('/berita', function () {
        return redirect()->route('berita.index');
    });

    // 🟥 Route Khusus Role ADMIN
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        // CRUD Berita
        Route::resource('berita', BeritaController::class)->parameters([
            'berita' => 'berita'
        ]);

        // Detail berita versi admin
        Route::get('/berita/{id}/detail-admin', [BeritaController::class, 'showDetailAdmin'])->name('berita.detail');
    });

    // 🟩 Route Khusus Role PETANI
    Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
        // Detail berita versi petani
        Route::get('/berita/{id}/detail-petani', [BeritaController::class, 'showDetailPetani'])->name('berita.show-petani');
    });
    
});

require __DIR__.'/auth.php';
