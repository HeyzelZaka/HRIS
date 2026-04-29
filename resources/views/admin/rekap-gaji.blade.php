@extends('layouts.admin')

@section('content')
<div class="min-h-full flex flex-col">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Rekap Gaji Karyawan</h2>
            <p class="text-sm text-gray-400">Laporan pembayaran gaji seluruh staf</p>
        </div>
        <div class="flex gap-4">
            <button class="bg-gray-100 text-gray-700 px-6 py-3 rounded-2xl font-bold text-sm hover:bg-gray-200 transition-all flex items-center gap-2">
                <i class="fas fa-file-export"></i> Export Excel
            </button>
            <button class="bg-hris-teal text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-lg hover:bg-cyan-700 transition-all flex items-center gap-2">
                <i class="fas fa-plus"></i> Generate Gaji Bulan Ini
            </button>
        </div>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest">Karyawan</th>
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest">Periode</th>
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest">Gaji Pokok</th>
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest">Tunjangan</th>
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest">Potongan</th>
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest text-right">Total</th>
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest text-center">Status</th>
                    <th class="px-6 py-4 font-black text-gray-400 uppercase text-[10px] tracking-widest text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($gajis as $gaji)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-bold text-gray-800">{{ $gaji->user->name }}</div>
                        <div class="text-[10px] text-gray-400 font-bold uppercase">{{ $gaji->user->jabatan ?? 'Staf' }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm font-bold text-gray-600">
                        {{ Carbon\Carbon::create()->month($gaji->bulan)->translatedFormat('F') }} {{ $gaji->tahun }}
                    </td>
                    <td class="px-6 py-4 text-sm font-bold text-gray-700">Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-sm font-bold text-green-600">+ {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-sm font-bold text-red-500">- {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="font-black text-gray-800">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $gaji->status == 'dibayar' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $gaji->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.slip_gaji.show', $gaji->id) }}" class="inline-flex items-center gap-2 text-hris-teal font-black text-[10px] uppercase tracking-widest hover:underline">
                            <i class="fas fa-eye"></i> Slip
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection