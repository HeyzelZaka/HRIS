@extends('layouts.admin')

@section('content')
<div class="min-h-full flex flex-col">

    <div class="flex flex-wrap gap-10">
        <div class="w-64 rounded-[32px] shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden flex flex-col group bg-white">
            <div class="bg-hris-teal p-6 text-center">
                <h3 class="font-bold text-lg text-white uppercase tracking-wider">Total Karyawan</h3>
            </div>
            <div class="bg-hris-gray-card p-10 flex-1 flex flex-col items-center justify-center relative">
                <i class="fas fa-users absolute text-black/5 text-7xl group-hover:scale-125 transition-transform duration-500"></i>
                <div class="text-7xl font-black text-hris-teal z-10 drop-shadow-sm">{{ $totalKaryawan }}</div>
            </div>
        </div>

        <div class="w-64 rounded-[32px] shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden flex flex-col group bg-white">
            <div class="bg-hris-teal p-6 text-center">
                <h3 class="font-bold text-lg text-white uppercase tracking-wider">Aktif</h3>
            </div>
            <div class="bg-hris-gray-card p-10 flex-1 flex flex-col items-center justify-center relative">
                <i class="fas fa-user-check absolute text-black/5 text-7xl group-hover:scale-125 transition-transform duration-500"></i>
                <div class="text-7xl font-black text-hris-teal z-10 drop-shadow-sm">{{ $aktif }}</div>
            </div>
        </div>

        <div class="w-64 rounded-[32px] shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden flex flex-col group bg-white">
            <div class="bg-hris-teal p-6 text-center">
                <h3 class="font-bold text-lg text-white uppercase tracking-wider">Cuti</h3>
            </div>
            <div class="bg-hris-gray-card p-10 flex-1 flex flex-col items-center justify-center relative">
                <i class="fas fa-user-slash absolute text-black/5 text-7xl group-hover:scale-125 transition-transform duration-500"></i>
                <div class="text-7xl font-black text-hris-teal z-10 drop-shadow-sm">{{ $sedangCuti }}</div>
            </div>
        </div>
    </div>

    <div class="mt-12">
        <h3 class="text-gray-700 font-extrabold mb-6 flex items-center gap-2 tracking-tight uppercase text-sm">
            <i class="fas fa-th-large text-hris-teal"></i> Menu Utama
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="{{ route('admin.rekap_gaji') }}" class="p-6 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all group border-b-4 border-b-orange-400">
                <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <i class="fas fa-money-bill-wave text-xl"></i>
                </div>
                <h4 class="font-bold text-gray-800">Payroll & Gaji</h4>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Kelola Gaji & Lembur</p>
            </a>

            <a href="#" class="p-6 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all group border-b-4 border-b-hris-teal">
                <div class="w-12 h-12 bg-cyan-100 text-hris-teal rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <i class="fas fa-calendar-check text-xl"></i>
                </div>
                <h4 class="font-bold text-gray-800">Rekap Absensi</h4>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Log Check-in/out</p>
            </a>

            <a href="#" class="p-6 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all group border-b-4 border-b-purple-400">
                <div class="w-12 h-12 bg-purple-100 text-purple-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <i class="fas fa-user-check text-xl"></i>
                </div>
                <h4 class="font-bold text-gray-800">Approval Cuti</h4>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Konfirmasi Pengajuan</p>
            </a>

            <a href="{{ route('admin.slip_gaji.index') }}" class="p-6 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all group border-b-4 border-b-red-400">
                <div class="w-12 h-12 bg-red-100 text-red-500 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                    <i class="fas fa-file-pdf text-xl"></i>
                </div>
                <h4 class="font-bold text-gray-800">Slip Gaji PDF</h4>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Cetak Dokumen</p>
            </a>
        </div>
    </div>

    <div class="mt-auto pt-16">
        <div class="inline-flex items-center gap-6 p-5 bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="w-10 h-10 rounded-xl bg-hris-teal/10 text-hris-teal flex items-center justify-center shadow-inner">
                <i class="fas fa-lightbulb"></i>
            </div>
            <div class="text-sm">
                <span class="font-bold text-gray-800">Sistem HRISign v1.0</span> 
                <span class="text-gray-400 mx-2">|</span>
                <span class="text-gray-500">Data diperbarui secara otomatis hari ini.</span>
            </div>
        </div>
    </div>

</div>
@endsectionv>

</div>
@endsection