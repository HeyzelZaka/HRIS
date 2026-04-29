@extends('layouts.karyawan')

@section('content')
@vite([
    'resources/css/karyawan-cuti.css', 
    'resources/css/karyawan-profile.css', 
    'resources/js/karyawan-profile.js'
])

<div class="space-y-8">
    
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-4 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="border border-gray-200 shadow-sm rounded-3xl overflow-hidden">
        <div class="card-cuti-header bg-[#00acc1] text-white p-4 font-black tracking-widest text-center">CUTI TAHUNAN</div>
        <div class="box-abu text-center p-10 bg-white">
            <div class="flex items-center justify-center gap-6 mb-12">
                <i class="fas fa-clipboard-list text-6xl text-[#00acc1]/50"></i>
                <span class="text-2xl font-black text-gray-800">Sisa Cuti : {{ $sisaCuti ?? 12 }} hari</span>
            </div>
            <a href="{{ route('karyawan.cuti.ajukan') }}" class="inline-block bg-[#00acc1] text-white px-16 py-4 rounded-full font-black text-lg shadow-lg hover:bg-cyan-700 transition-all">
                Ajukan Cuti
            </a>
        </div>
    </div>

    <div class="border border-gray-200 shadow-sm rounded-3xl overflow-hidden mt-8">
        <div class="bg-gray-100 p-4 font-bold text-gray-700">Riwayat Pengajuan Cuti</div>
        <div class="p-6 bg-white">
            @if($cutis->isEmpty())
                <p class="text-center text-gray-500 py-4">Belum ada riwayat pengajuan cuti.</p>
            @else
                <div class="space-y-4">
                    @foreach($cutis as $cuti)
                    <div class="flex justify-between items-center p-4 border border-gray-100 rounded-xl hover:shadow-md transition">
                        <div>
                            <p class="font-bold text-gray-800">{{ ucfirst($cuti->jenis_cuti) }}</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}</p>
                        </div>
                        <div class="text-right">
                            <span class="px-3 py-1 text-xs font-bold rounded-full 
                                {{ $cuti->status == 'disetujui' ? 'bg-green-100 text-green-700' : ($cuti->status == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ ucfirst($cuti->status) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection