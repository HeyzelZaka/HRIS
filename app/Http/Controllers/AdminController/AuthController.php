<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login (Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'Password' => 'required',
        ]);
    }
    if (Auth :: attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
    return back()->withErrors([
        'email'=> 'Email atau password salah',
    ]);

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'
        ])
    }
}

