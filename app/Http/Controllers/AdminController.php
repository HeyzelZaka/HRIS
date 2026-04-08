<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }
    // menampilkan halaman register
    public function showRegister()
    {
    return view('auth.register');
    }
}