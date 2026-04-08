<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\TesterController;
use App\Http\Controllers\AdminController\AuthController;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',[TesterController::class,'index']);
Route::prefix('admin')->group(function () {
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminController::class, 'Login']);
    //route::get('/register','showRegister')->name('Register');
    //route::get('/register','register');
Route::get('/register', [AdminController::class, 'showRegister'])->name('register');
});





