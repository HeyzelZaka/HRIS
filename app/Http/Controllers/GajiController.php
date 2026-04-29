<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GajiController extends Controller
{
    // Untuk Admin: Rekap Gaji Seluruh Karyawan
    public function rekap()
    {
        $gajis = Gaji::with('user')->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->get();
        return view('admin.rekap-gaji', compact('gajis'));
    }

    // Untuk Admin: Halaman Daftar Slip Gaji (Sama seperti rekap tapi fokus ke pencetakan)
    public function adminSlipIndex()
    {
        $gajis = Gaji::with('user')->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->get();
        return view('admin.slip-gaji-index', compact('gajis'));
    }

    // Untuk Admin: Rekap Umum (Absensi & Cuti)
    public function rekapUmum()
    {
        $absensi = Absensi::with('user')->orderBy('tanggal', 'desc')->take(100)->get();
        $cuti = Cuti::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.rekap-umum', compact('absensi', 'cuti'));
    }

    // Untuk Karyawan: Daftar Slip Gaji Pribadi
    public function index()
    {
        $gajis = Gaji::where('user_id', Auth::id())->orderBy('tahun', 'desc')->orderBy('bulan', 'desc')->get();
        return view('karyawan.riwayat-gaji', compact('gajis'));
    }

    // Untuk Karyawan & Admin: Detail Slip Gaji
    public function show(Gaji $gaji)
    {
        // Pastikan hanya pemilik atau admin/hrd yang bisa lihat
        if (Auth::user()->role == 'karyawan' && $gaji->user_id != Auth::id()) {
            abort(403);
        }

        return view('karyawan.slip-gaji', compact('gaji'));
    }
}