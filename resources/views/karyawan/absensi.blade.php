@extends('layouts.karyawan')

@section('content')
@vite(['resources/css/karyawan-absensi.css'])

<div class="max-w-4xl mx-auto">
    <div class="absensi-main-card">
        <div class="card-header-teal">
            <h3 class="text-white font-black text-sm tracking-[0.2em] uppercase">Absensi</h3>
        </div>
        
        <div class="camera-viewport">
            <i class="fas fa-camera"></i>
            <button class="btn-absensi">
                Buka Kamera
            </button>
            <p class="mt-5 text-black font-bold text-xs">
                Masukkan Foto Untuk Absen Masuk/Pulang
            </p>
        </div>
    </div>

    <div class="summary-container">
        <div class="summary-header">
            Ringkasan Hari Ini
        </div>
        <div class="summary-body">
            <div class="summary-row">
                <span>Jam Masuk :</span>
                <span>08.00</span>
            </div>
            <div class="summary-row">
                <span>Jam Pulang :</span>
                <span>-</span>
            </div>
        </div>
    </div>
</div>
@endsection