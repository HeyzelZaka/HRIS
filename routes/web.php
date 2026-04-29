<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Karyawan\AbsensiController;
use App\Http\Controllers\Karyawan\CutiController;
use App\Http\Controllers\Karyawan\DashboardController;
use App\Http\Controllers\HRD\HrdController;
use App\Http\Controllers\GajiController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminController::class, 'Login']);
Route::get('/register', [AdminController::class, 'showRegister'])->name('register');
Route::post('/register', [AdminController::class, 'Register']);
Route::post('/logout', [AdminController::class, 'Logout'])->name('logout');

// ==========================================
// 1. GRUP ROUTE ADMIN (Khusus untuk Admin)
// ==========================================
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Rekap & Slip Gaji Admin
    Route::get('/rekap', [GajiController::class, 'rekapUmum'])->name('admin.rekap_umum');
    Route::get('/rekap-gaji', [GajiController::class, 'rekap'])->name('admin.rekap_gaji');
    Route::get('/slip-gaji', [GajiController::class, 'adminSlipIndex'])->name('admin.slip_gaji.index');
    Route::get('/slip-gaji/{gaji}', [GajiController::class, 'show'])->name('admin.slip_gaji.show');

    // Menu Admin
    Route::get('/karyawan', [AdminController::class, 'karyawan'])->name('admin.karyawan.index');
    Route::get('/hrd', [AdminController::class, 'hrd'])->name('admin.hrd.index');
});

// ==========================================
// 2. GRUP ROUTE KARYAWAN 
// ==========================================
Route::prefix('karyawan')->middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('karyawan.dashboard');
    
    // Slip Gaji
    Route::get('/gaji', [GajiController::class, 'index'])->name('karyawan.gaji.index');
    Route::get('/gaji/slip/{gaji}', [GajiController::class, 'show'])->name('karyawan.gaji.slip');

    // Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('karyawan.absensi');
    Route::post('/absensi/masuk', [AbsensiController::class, 'absenMasuk'])->name('karyawan.absen.masuk');
    Route::post('/absensi/keluar', [AbsensiController::class, 'absenKeluar'])->name('karyawan.absen.keluar');
    
    // Cuti
    Route::get('/cuti', [CutiController::class, 'index'])->name('karyawan.cuti');
    Route::get('/cuti/ajukan', [CutiController::class, 'create'])->name('karyawan.cuti.ajukan');
    Route::post('/cuti/ajukan', [CutiController::class, 'store'])->name('karyawan.cuti.store');
});

// ==========================================
// 3. GRUP ROUTE HRD
// ==========================================
Route::prefix('hrd')->middleware(['auth', 'role:hrd'])->group(function () {
    Route::get('/absen', [HrdController::class, 'absenIndex'])->name('hrd.absen');

    Route::get('/cuti', [HrdController::class, 'cutiIndex'])->name('hrd.cuti');
    Route::post('/cuti/{cuti}/approve', [HrdController::class, 'cutiApprove'])->name('hrd.cuti.approve');
    Route::post('/cuti/{cuti}/reject', [HrdController::class, 'cutiReject'])->name('hrd.cuti.reject');

    Route::get('/lembur', [HrdController::class, 'lemburIndex'])->name('hrd.lembur');
    Route::post('/lembur/{lembur}/approve', [HrdController::class, 'lemburApprove'])->name('hrd.lembur.approve');
    Route::post('/lembur/{lembur}/reject', [HrdController::class, 'lemburReject'])->name('hrd.lembur.reject');
});