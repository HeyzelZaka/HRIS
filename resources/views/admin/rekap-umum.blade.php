@extends('layouts.admin')

@section('content')
<div class="min-h-full flex flex-col space-y-12">
    <!-- Header -->
    <div>
        <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tighter">Rekapitulasi Umum</h2>
        <p class="text-gray-400 font-bold text-sm mt-1 uppercase tracking-widest">Laporan Absensi & Cuti Karyawan</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Rekap Absensi -->
        <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 flex flex-col h-[500px]">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-black text-gray-700 uppercase tracking-widest text-sm flex items-center gap-3">
                    <i class="fas fa-calendar-check text-hris-teal"></i> Absensi Terbaru
                </h3>
                <a href="#" class="text-[10px] font-black text-hris-teal uppercase tracking-widest hover:underline">Lihat Semua</a>
            </div>
            <div class="flex-1 overflow-y-auto pr-2 space-y-4">
                @foreach($absensi as $item)
                <div class="flex items-center justify-between p-5 bg-gray-50 rounded-3xl border border-gray-100">
                    <div>
                        <p class="font-black text-gray-800 text-sm">{{ $item->user->name }}</p>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</p>
                    </div>
                    <div class="text-right">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest 
                            {{ $item->status == 'hadir' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $item->status }}
                        </span>
                        <p class="text-[10px] font-bold text-gray-500 mt-1 uppercase">{{ $item->jam_masuk ?? '-' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Rekap Cuti -->
        <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 flex flex-col h-[500px]">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-black text-gray-700 uppercase tracking-widest text-sm flex items-center gap-3">
                    <i class="fas fa-umbrella-beach text-orange-400"></i> Pengajuan Cuti
                </h3>
                <a href="#" class="text-[10px] font-black text-hris-teal uppercase tracking-widest hover:underline">Kelola Cuti</a>
            </div>
            <div class="flex-1 overflow-y-auto pr-2 space-y-4">
                @foreach($cuti as $item)
                <div class="flex items-center justify-between p-5 bg-gray-50 rounded-3xl border border-gray-100">
                    <div>
                        <p class="font-black text-gray-800 text-sm">{{ $item->user->name }}</p>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ ucfirst($item->jenis_cuti) }} • {{ $item->total_hari }} Hari</p>
                    </div>
                    <div class="text-right">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest 
                            {{ $item->status == 'disetujui' ? 'bg-green-100 text-green-700' : ($item->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                            {{ $item->status }}
                        </span>
                        <p class="text-[10px] font-bold text-gray-500 mt-1 uppercase">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d M') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection