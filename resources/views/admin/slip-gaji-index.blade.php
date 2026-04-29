@extends('layouts.admin')

@section('content')
<div class="min-h-full flex flex-col space-y-12">
    <!-- Header -->
    <div>
        <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tighter">Slip Gaji Digital</h2>
        <p class="text-gray-400 font-bold text-sm mt-1 uppercase tracking-widest">Cetak & Distribusi Slip Gaji Karyawan</p>
    </div>

    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($gajis as $gaji)
            <div class="p-8 bg-gray-50 rounded-[40px] border border-gray-100 hover:border-hris-teal transition-all group relative overflow-hidden">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-gray-400 group-hover:text-hris-teal group-hover:shadow-lg transition-all">
                        <i class="fas fa-file-invoice-dollar text-xl"></i>
                    </div>
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">{{ $gaji->status }}</span>
                </div>
                
                <h3 class="font-black text-gray-800 text-lg leading-tight mb-1">{{ $gaji->user->name }}</h3>
                <p class="text-[10px] font-black text-hris-teal uppercase tracking-widest mb-6">{{ Carbon\Carbon::create()->month($gaji->bulan)->translatedFormat('F') }} {{ $gaji->tahun }}</p>
                
                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total Gaji</p>
                        <p class="text-xl font-black text-gray-800">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{ route('admin.slip_gaji.show', $gaji->id) }}" class="w-10 h-10 bg-hris-teal text-white rounded-xl flex items-center justify-center shadow-lg shadow-hris-teal/20 hover:scale-110 transition-all">
                        <i class="fas fa-eye text-xs"></i>
                    </a>
                </div>

                <div class="absolute -right-6 -top-6 w-20 h-20 bg-hris-teal/5 rounded-full"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection