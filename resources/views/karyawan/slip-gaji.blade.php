@extends('layouts.karyawan')

@section('content')
<div class="max-w-3xl mx-auto space-y-10">
    <div class="flex justify-between items-center">
        <a href="{{ route('karyawan.gaji.index') }}" class="text-gray-400 hover:text-gray-800 transition-all font-black text-xs uppercase tracking-widest flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <button onclick="window.print()" class="bg-gray-800 text-white px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-lg hover:bg-black transition-all">
            <i class="fas fa-print mr-2"></i> Cetak Slip Gaji
        </button>
    </div>

    <div class="bg-white p-16 rounded-[60px] shadow-2xl border border-gray-50 relative overflow-hidden print:shadow-none print:p-0">
        <!-- Logo & Header -->
        <div class="flex justify-between items-start mb-16">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/HRIS.jpeg') }}" class="w-12 h-12 rounded-xl" alt="Logo">
                    <h2 class="text-2xl font-black text-gray-800 tracking-tighter">HRISign</h2>
                </div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest max-w-[200px] leading-relaxed">
                    Jl. Teknologi No. 404, Kota Inovasi, Indonesia
                </p>
            </div>
            <div class="text-right">
                <h1 class="text-4xl font-black text-gray-800 uppercase tracking-tighter mb-2">SLIP GAJI</h1>
                <p class="text-xs font-bold text-[#00acc1] uppercase tracking-[0.3em]">PERIODE {{ Carbon\Carbon::create()->month($gaji->bulan)->translatedFormat('F') }} {{ $gaji->tahun }}</p>
            </div>
        </div>

        <!-- Info Karyawan -->
        <div class="grid grid-cols-2 gap-10 mb-16 p-8 bg-gray-50 rounded-[40px] border border-gray-100">
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Nama Karyawan</p>
                <p class="text-lg font-black text-gray-800">{{ $gaji->user->name }}</p>
            </div>
            <div>
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Jabatan / Departemen</p>
                <p class="text-lg font-black text-gray-800">{{ $gaji->user->jabatan ?? '-' }} / {{ $gaji->user->departemen ?? '-' }}</p>
            </div>
        </div>

        <!-- Rincian Gaji -->
        <div class="space-y-6">
            <h3 class="text-sm font-black text-gray-800 uppercase tracking-widest pb-4 border-b-2 border-gray-100">Rincian Penghasilan</h3>
            
            <div class="flex justify-between items-center">
                <span class="text-sm font-bold text-gray-500">Gaji Pokok</span>
                <span class="text-sm font-black text-gray-800">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</span>
            </div>
            
            <div class="flex justify-between items-center">
                <span class="text-sm font-bold text-gray-500">Tunjangan Jabatan & Makan</span>
                <span class="text-sm font-black text-green-600">+ Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-sm font-bold text-gray-500">Potongan (BPJS/PPH21)</span>
                <span class="text-sm font-black text-red-500">- Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</span>
            </div>

            <div class="pt-10 mt-10 border-t-4 border-gray-800 flex justify-between items-center">
                <div>
                    <h4 class="text-xl font-black text-gray-800 uppercase tracking-tighter">Total Gaji Bersih</h4>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Ditransfer pada: {{ $gaji->dibayar_at ? Carbon\Carbon::parse($gaji->dibayar_at)->translatedFormat('d F Y') : '-' }}</p>
                </div>
                <div class="text-4xl font-black text-[#00acc1] tracking-tighter">
                    Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <!-- Footer Slip -->
        <div class="mt-20 flex justify-between items-end">
            <div class="text-center">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-20">Penerima,</p>
                <div class="w-40 h-[2px] bg-gray-200 mb-2"></div>
                <p class="text-xs font-black text-gray-800">{{ $gaji->user->name }}</p>
            </div>
            <div class="text-center">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-20">Manajer HRD,</p>
                <div class="w-40 h-[2px] bg-gray-200 mb-2"></div>
                <p class="text-xs font-black text-gray-800">Toni Sucipto</p>
            </div>
        </div>

        <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-[#00acc1]/5 rounded-full"></div>
    </div>
</div>

<style>
    @media print {
        body * { visibility: hidden; }
        .print\:shadow-none, .print\:shadow-none * { visibility: visible; }
        .print\:shadow-none { position: absolute; left: 0; top: 0; width: 100%; }
        .no-print { display: none !important; }
    }
</style>
@endsection