@extends('layouts.karyawan')

@section('content')
<div class="space-y-10">
    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100 flex justify-between items-center relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-black text-gray-800 tracking-tight">Riwayat Gaji 💰</h1>
            <p class="text-gray-400 font-bold text-sm mt-2 uppercase tracking-widest">Informasi penghasilan dan slip gaji bulanan</p>
        </div>
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-[#00acc1]/5 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 gap-6">
        @foreach($gajis as $gaji)
        <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-100 flex flex-wrap justify-between items-center hover:shadow-xl transition-all group">
            <div class="flex items-center gap-8">
                <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-400 group-hover:bg-[#00acc1]/10 group-hover:text-[#00acc1] transition-all">
                    <i class="fas fa-file-invoice-dollar text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-black text-gray-800">Periode {{ Carbon\Carbon::create()->month($gaji->bulan)->translatedFormat('F') }} {{ $gaji->tahun }}</h3>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Status: <span class="text-green-500">{{ $gaji->status }}</span></p>
                </div>
            </div>
            
            <div class="flex items-center gap-12">
                <div class="text-right">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total Diterima</p>
                    <p class="text-2xl font-black text-gray-800">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</p>
                </div>
                <a href="{{ route('karyawan.gaji.slip', $gaji->id) }}" class="bg-[#00acc1] text-white px-8 py-4 rounded-3xl font-black text-xs uppercase tracking-widest shadow-lg shadow-[#00acc1]/20 hover:scale-105 transition-all">
                    Lihat Slip
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection