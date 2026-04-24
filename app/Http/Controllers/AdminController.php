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
    // Fungsi untuk menampilkan rolenya
    public function Login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Cek Role User yang login
        if (Auth::user()->role == 'admin') {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended('/karyawan/dashboard');
        }
    }

    return back()->with('loginError', 'Email atau Password salah!');
}
}