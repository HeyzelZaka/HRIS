<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Cuti;
use App\Mail\WelcomeMail;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return $this->redirectByRole(Auth::user());
        }

        return back()
            ->withInput($request->only('email'))
            ->with('loginError', 'Email atau password yang Anda masukkan salah.');
    }

    public function Register(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
            'jabatan'    => 'nullable|string|max:100',
            'departemen' => 'nullable|string|max:100',
            'no_hp'      => 'nullable|string|max:15',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah digunakan.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'password'   => Hash::make($validated['password']),
            'role'       => 'karyawan',
            'jabatan'    => isset($validated['jabatan']) ? $validated['jabatan'] : null,
            'departemen' => isset($validated['departemen']) ? $validated['departemen'] : null,
            'no_hp'      => isset($validated['no_hp']) ? $validated['no_hp'] : null,
        ]);

        try {
            Mail::to($user->email)->send(new WelcomeMail($user));
        } catch (\Exception $e) {
            \Log::error('Gagal kirim email: ' . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('karyawan.dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name . '.');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }

    public function dashboard()
    {
        $totalKaryawan = User::where('role', 'karyawan')->count();
        $aktif = User::where('role', 'karyawan')->count(); 
        $sedangCuti = Cuti::where('status', 'disetujui')
            ->whereDate('tanggal_mulai', '<=', Carbon::now())
            ->whereDate('tanggal_selesai', '>=', Carbon::now())
            ->count();

        return view('admin.dashboard', compact('totalKaryawan', 'aktif', 'sedangCuti'));
    }

    public function karyawan()
    {
        $karyawans = User::where('role', 'karyawan')->get();
        return view('admin.karyawan', compact('karyawans'));
    }

    public function hrd()
    {
        $hrds = User::where('role', 'hrd')->get();
        return view('admin.hrd', compact('hrds'));
    }

    private function redirectByRole(User $user)
    {
        if ($user->role == 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->role == 'hrd') {
            return redirect()->intended('/hrd/absen');
        } elseif ($user->role == 'karyawan') {
            return redirect()->intended('/karyawan/dashboard');
        } else {
            return redirect('/');
        }
    }
}