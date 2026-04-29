<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Absensi;
use App\Models\Cuti;
use App\Models\Lembur;
use App\Mail\CutiStatusMail;
use App\Mail\LemburStatusMail;

class HrdController extends Controller
{
    // ABSENSI
    public function absenIndex()
    {
        $absensis = Absensi::with('user')->whereDate('tanggal', today())->orderBy('jam_masuk')->get();
        return view('hrd.absen', compact('absensis'));
    }

    // CUTI
    public function cutiIndex()
    {
        $cutis = Cuti::with('user')->orderBy('created_at', 'desc')->get();
        return view('hrd.cuti', compact('cutis'));
    }

    public function cutiApprove(Request $request, Cuti $cuti)
    {
        return $this->prosesCuti($cuti, 'disetujui', $request->catatan_hrd);
    }

    public function cutiReject(Request $request, Cuti $cuti)
    {
        $request->validate(['catatan_hrd' => 'required|string|min:5'], [
            'catatan_hrd.required' => 'Alasan penolakan wajib diisi.',
        ]);
        return $this->prosesCuti($cuti, 'ditolak', $request->catatan_hrd);
    }

    private function prosesCuti(Cuti $cuti, $status, $catatan)
    {
        if (!$cuti->isPending()) {
            return back()->with('error', 'Cuti ini sudah diproses sebelumnya.');
        }

        $cuti->update([
            'status'        => $status,
            'catatan_hrd'   => $catatan,
            'diproses_oleh' => Auth::id(),
            'diproses_at'   => now(),
        ]);

        try {
            Mail::to($cuti->user->email)->send(new CutiStatusMail($cuti));
        } catch (\Exception $e) {
            \Log::error('Gagal kirim email cuti: ' . $e->getMessage());
        }

        $pesan = $status === 'disetujui' ? 'Cuti disetujui.' : 'Cuti ditolak.';
        return back()->with('success', $pesan . ' Email notifikasi telah dikirim ke karyawan.');
    }

    // LEMBUR
    public function lemburIndex()
    {
        $lemburs = Lembur::with('user')->orderBy('created_at', 'desc')->get();
        return view('hrd.lembur', compact('lemburs'));
    }

    public function lemburApprove(Request $request, Lembur $lembur)
    {
        return $this->prosesLembur($lembur, 'disetujui');
    }

    public function lemburReject(Request $request, Lembur $lembur)
    {
        return $this->prosesLembur($lembur, 'ditolak');
    }

    private function prosesLembur(Lembur $lembur, $status)
    {
        $lembur->update([
            'status'        => $status,
            'diproses_oleh' => Auth::id(),
            'diproses_at'   => now(),
        ]);

        try {
            Mail::to($lembur->user->email)->send(new LemburStatusMail($lembur));
        } catch (\Exception $e) {
            \Log::error('Gagal kirim email lembur: ' . $e->getMessage());
        }

        $pesan = $status === 'disetujui' ? 'Lembur disetujui.' : 'Lembur ditolak.';
        return back()->with('success', $pesan . ' Email notifikasi terkirim.');
    }
}