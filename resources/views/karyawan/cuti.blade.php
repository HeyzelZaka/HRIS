@extends('layouts.karyawan')

@section('content')
@vite([
    'resources/css/karyawan-cuti.css', 
    'resources/css/karyawan-profile.css', 
    'resources/js/karyawan-profile.js'
])

<div class="space-y-8">
    <div class="relative inline-block profile-trigger-area">
        <div onclick="toggleProfile()" class="cursor-pointer flex items-center gap-4">
            
        </div>
    </div>

    <div class="border border-gray-200 shadow-sm">
        <div class="card-cuti-header">CUTI</div>
        <div class="box-abu text-center">
            <div class="flex items-center justify-center gap-6 mb-12">
                <i class="fas fa-clipboard-list text-6xl text-gray-600"></i>
                <span class="text-2xl font-black text-gray-800">Sisa Cuti : 10 hari</span>
            </div>
            <a href="/karyawan/cuti/ajukan" class="inline-block bg-[#00acc1] text-white px-16 py-4 rounded-full font-black text-lg shadow-lg hover:bg-cyan-700 transition-all">
                Ajukan Cuti
            </a>
        </div>
    </div>
</div>
@endsection