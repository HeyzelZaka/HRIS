<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Cuti;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $totalKehadiran = Absensi::where('user_id', $user->id)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year)
            ->whereIn('status', ['hadir', 'terlambat'])
            ->count();
            
        $cutiDiambil = Cuti::where('user_id', $user->id)
            ->where('status', 'disetujui')
            ->whereYear('tanggal_mulai', Carbon::now()->year)
            ->sum('total_hari');
            
        $sisaCuti = 12 - $cutiDiambil; // Misal jatah cuti 12 hari/tahun
        
        $riwayatTerbaru = Absensi::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->take(5)
            ->get();

        return view('karyawan.dashboard', compact('user', 'totalKehadiran', 'sisaCuti', 'riwayatTerbaru'));
    }
}