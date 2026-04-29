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
        <h2 class="text-xl font-bold text-gray-800">Daftar Pengajuan Lembur</h2>
    </div>

    <table class="hris-table-admin w-full">
        <thead>
            <tr class="text-left border-b border-gray-200">
                <th class="w-16 pb-3">ID</th>
                <th class="pb-3">Nama Karyawan</th>
                <th class="pb-3">Shift & Tanggal</th>
                <th class="pb-3">Jam Lembur</th>
                <th class="pb-3 text-center">Status</th>
                <th class="pb-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lemburs as $lembur)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                <td class="py-4">{{ $lembur->id }}</td>
                <td class="font-bold text-gray-700 py-4">{{ $lembur->user->name }}</td>
                <td class="py-4">
                    <div class="font-bold">Shift: {{ $lembur->shift }}</div>
                    <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($lembur->tanggal)->format('d M Y') }}</div>
                </td>
                <td class="py-4 font-bold text-gray-600">
                    {{ \Carbon\Carbon::parse($lembur->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($lembur->jam_selesai)->format('H:i') }}
                    <span class="text-xs text-gray-400 block">({{ $lembur->total_jam }} jam)</span>
                </td>
                <td class="py-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                        {{ $lembur->status == 'disetujui' ? 'bg-green-100 text-green-700' : ($lembur->status == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ ucfirst($lembur->status) }}
                    </span>
                </td>
                <td class="py-4">
                    @if($lembur->status == 'pending')
                    <div class="flex justify-center gap-2 items-center">
                        <form action="{{ route('hrd.lembur.reject', $lembur->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="w-8 h-8 rounded bg-red-100 text-red-600 hover:bg-red-500 hover:text-white flex items-center justify-center transition" title="Tolak">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                        <form action="{{ route('hrd.lembur.approve', $lembur->id) }}" method="POST" class="inline">
                            @csrf
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
                <td colspan="6" class="text-center py-6 text-gray-500">Belum ada pengajuan lembur.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection