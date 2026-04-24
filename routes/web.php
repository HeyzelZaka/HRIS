<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminController\TesterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TesterController::class, 'index']);

// ==========================================
// 1. GRUP ROUTE ADMIN (Khusus untuk Admin)
// ==========================================
Route::prefix('admin')->group(function () {
    
    // Auth Admin
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'Login']);
    Route::get('/register', [AdminController::class, 'showRegister'])->name('register');

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Menu Admin
    Route::get('/karyawan', function () {
        return view('admin.karyawan'); 
    })->name('karyawan.index');

    Route::get('/hrd', function () {
        return view('admin.hrd');
    })->name('hrd.index');
}); 


// 2. GRUP ROUTE KARYAWAN 
Route::prefix('karyawan')->group(function () {
    Route::get('/dashboard', function () {
        return view('karyawan.dashboard');
    })->name('karyawan.dashboard');
     Route::get('/absensi', function () {
        return view('karyawan.absensi');
    })->name('karyawan.absensi');
     Route::get('/cuti', function () {
        return view('karyawan.cuti');
    })->name('karyawan.cuti');
    Route::get('/cuti/ajukan', function () {
        return view('karyawan.ajukan-cuti');
    })->name('karyawan.cuti.ajukan');
});
// Grup HRD
Route::prefix('hrd')->group(function () {
    Route::get('/absen', function () { 
        return view('hrd.absen'); 
    })->name('hrd.absen');

    Route::get('/cuti', function () { 
        return view('hrd.cuti'); 
    })->name('hrd.cuti');

    Route::get('/lembur', function () { 
        return view('hrd.lembur'); 
    })->name('hrd.lembur');
});