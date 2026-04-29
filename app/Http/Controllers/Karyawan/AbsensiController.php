<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $user       = Auth::user();
        $bulanIni   = $user->absenBulanIni()->orderBy('tanggal', 'desc')->get();
        $sudahAbsen = Absensi::where('user_id', $user->id)->whereDate('tanggal', today())->first();

        $stats = [
            'hadir'     => $bulanIni->where('status', 'hadir')->count(),
            'terlambat' => $bulanIni->where('status', 'terlambat')->count(),
            'izin'      => $bulanIni->where('status', 'izin')->count(),
            'sakit'     => $bulanIni->where('status', 'sakit')->count(),
            'alfa'      => $bulanIni->where('status', 'alfa')->count(),
        ];

        return view('karyawan.absensi', compact('bulanIni', 'sudahAbsen', 'stats'));
    }

    public function absenMasuk(Request $request)
    {
        $user = Auth::user();

        $existing = Absensi::where('user_id', $user->id)->whereDate('tanggal', today())->first();
        if ($existing) {
            return back()->with('error', 'Anda sudah melakukan absen masuk hari ini.');
        }

        $jamMasuk   = Carbon::now()->format('H:i:s');
        $batasWaktu = Carbon::today()->setTime(8, 10);
        $status     = Carbon::now()->gt($batasWaktu) ? 'terlambat' : 'hadir';

        Absensi::create([
            'user_id'   => $user->id,
            'tanggal'   => today(),
            'jam_masuk' => $jamMasuk,
            'status'    => $status,
        ]);

        $pesan = $status === 'terlambat' ? 'Absen masuk berhasil, namun Anda terlambat.' : 'Absen masuk berhasil. Selamat bekerja!';
        return back()->with('success', $pesan);
    }

    public function absenKeluar(Request $request)
    {
        $absensi = Absensi::where('user_id', Auth::id())->whereDate('tanggal', today())->first();

        if (!$absensi) {
            return back()->with('error', 'Anda belum melakukan absen masuk hari ini.');
        }
        if ($absensi->jam_keluar) {
            return back()->with('error', 'Anda sudah melakukan absen keluar hari ini.');
        }

        $absensi->update(['jam_keluar' => Carbon::now()->format('H:i:s')]);
        return back()->with('success', 'Absen keluar berhasil. Sampai jumpa besok!');
    }
}