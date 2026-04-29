<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuti;
use Carbon\Carbon;

class CutiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cutis = Cuti::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        
        $cutiDiambil = Cuti::where('user_id', $user->id)
            ->where('status', 'disetujui')
            ->whereYear('tanggal_mulai', Carbon::now()->year)
            ->sum('total_hari');
            
        $sisaCuti = 12 - $cutiDiambil;

        return view('karyawan.cuti', compact('cutis', 'sisaCuti'));
    }

    public function create()
    {
        return view('karyawan.ajukan-cuti');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_cuti'      => 'required|in:tahunan,sakit,melahirkan,darurat,lainnya',
            'tanggal_mulai'   => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan'          => 'required|string|min:10|max:500',
            'lampiran'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'tanggal_mulai.after_or_equal'   => 'Tanggal mulai tidak boleh sebelum hari ini.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
            'alasan.min'                     => 'Alasan minimal 10 karakter.',
        ]);

        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran-cuti', 'public');
        }

        $mulai     = Carbon::parse($validated['tanggal_mulai']);
        $selesai   = Carbon::parse($validated['tanggal_selesai']);
        $totalHari = $mulai->diffInWeekdays($selesai) + 1;

        Cuti::create([
            'user_id'         => Auth::id(),
            'jenis_cuti'      => $validated['jenis_cuti'],
            'tanggal_mulai'   => $validated['tanggal_mulai'],
            'tanggal_selesai' => $validated['tanggal_selesai'],
            'total_hari'      => $totalHari,
            'alasan'          => $validated['alasan'],
            'lampiran'        => $lampiranPath,
            'status'          => 'pending',
        ]);

        return redirect()->route('karyawan.cuti')
            ->with('success', 'Pengajuan cuti berhasil dikirim. Menunggu persetujuan HRD.');
    }
}