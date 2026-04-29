@extends('layouts.karyawan')

@section('content')
@vite(['resources/css/karyawan-absensi.css'])

<div class="max-w-4xl mx-auto">
    
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-4 font-bold">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-4 font-bold">
            {{ session('error') }}
        </div>
    @endif

    <div class="absensi-main-card">
        <div class="card-header-teal">
            <h3 class="text-white font-black text-sm tracking-[0.2em] uppercase">Absensi Hari Ini</h3>
        </div>
        
        <div class="camera-viewport text-center py-10">
            <i class="fas fa-camera text-4xl mb-4 text-gray-400"></i>
            
            <div class="flex justify-center gap-4 mt-5">
                @if(!$sudahAbsen)
                <form action="{{ route('karyawan.absen.masuk') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-absensi bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full font-bold shadow-lg">
                        Absen Masuk
                    </button>
                </form>
                @elseif(!$sudahAbsen->jam_keluar)
                <form action="{{ route('karyawan.absen.keluar') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-absensi bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full font-bold shadow-lg">
                        Absen Pulang
                    </button>
                </form>
                @else
                <div class="text-green-600 font-bold">
                    <i class="fas fa-check-circle text-2xl"></i><br>
                    Anda sudah menyelesaikan absensi hari ini.
                </div>
                @endif
            </div>
            
            <p class="mt-5 text-gray-500 font-bold text-xs">
                Pastikan Anda berada di area kantor saat melakukan absensi.
            </p>
        </div>
    </div>

    <div class="summary-container mt-8">
        <div class="summary-header">
            Ringkasan Hari Ini
        </div>
        <div class="summary-body bg-white p-6 rounded-b-3xl shadow-sm border border-gray-100">
            <div class="summary-row flex justify-between mb-4 border-b pb-2">
                <span class="font-bold text-gray-600">Jam Masuk :</span>
                <span class="font-black text-gray-800">{{ $sudahAbsen->jam_masuk ?? '-' }}</span>
            </div>
            <div class="summary-row flex justify-between">
                <span class="font-bold text-gray-600">Jam Pulang :</span>
                <span class="font-black text-gray-800">{{ $sudahAbsen->jam_keluar ?? '-' }}</span>
            </div>
        </div>
    </div>
</div>
@endsection