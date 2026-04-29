@extends('layouts.hrd')

@section('content')
<div class="card-container-hrd shadow-sm">
    
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

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Pengajuan Cuti</h2>
    </div>

    <table class="hris-table-admin w-full">
        <thead>
            <tr class="text-left border-b border-gray-200">
                <th class="w-16 pb-3">ID</th>
                <th class="pb-3">Nama Karyawan</th>
                <th class="pb-3">Jenis & Tanggal</th>
                <th class="pb-3 text-center">Status</th>
                <th class="pb-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cutis as $cuti)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                <td class="py-4">{{ $cuti->id }}</td>
                <td class="font-bold text-gray-700 py-4">{{ $cuti->user->name }}</td>
                <td class="py-4">
                    <div class="font-bold">{{ ucfirst($cuti->jenis_cuti) }} ({{ $cuti->total_hari }} Hari)</div>
                    <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d M Y') }}</div>
                </td>
                <td class="py-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                        {{ $cuti->status == 'disetujui' ? 'bg-green-100 text-green-700' : ($cuti->status == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ ucfirst($cuti->status) }}
                    </span>
                </td>
                <td class="py-4">
                    @if($cuti->status == 'pending')
                    <div class="flex justify-center gap-2 items-center">
                        <form action="{{ route('hrd.cuti.reject', $cuti->id) }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="catatan_hrd" value="Ditolak oleh HRD">
                            <button type="submit" class="w-8 h-8 rounded bg-red-100 text-red-600 hover:bg-red-500 hover:text-white flex items-center justify-center transition" title="Tolak">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                        <form action="{{ route('hrd.cuti.approve', $cuti->id) }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="catatan_hrd" value="Disetujui oleh HRD">
                            <button type="submit" class="w-8 h-8 rounded bg-green-100 text-green-600 hover:bg-green-500 hover:text-white flex items-center justify-center transition" title="Setujui">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="text-center text-xs text-gray-400 font-bold">Diproses</div>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-6 text-gray-500">Belum ada data pengajuan cuti.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection