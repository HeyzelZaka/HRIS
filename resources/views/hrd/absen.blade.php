@extends('layouts.hrd')

@section('content')
<div class="card-container-hrd">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Rekap Absensi Hari Ini</h2>
        <div class="text-sm text-gray-500">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
    </div>

    <table class="hris-table-admin w-full">
        <thead>
            <tr class="text-left border-b border-gray-200">
                <th class="w-24 pb-3">ID</th>
                <th class="pb-3">Nama Karyawan</th>
                <th class="pb-3">Status</th>
                <th class="pb-3">Jam Masuk</th>
                <th class="pb-3">Jam Keluar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($absensis as $absen)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                <td class="py-4">{{ $absen->id }}</td>
                <td class="font-bold text-gray-700 py-4">{{ $absen->user->name }}</td>
                <td class="py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold 
                        {{ $absen->status == 'hadir' ? 'bg-green-100 text-green-700' : ($absen->status == 'terlambat' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                        {{ ucfirst($absen->status) }}
                    </span>
                </td>
                <td class="py-4">{{ $absen->jam_masuk ?? '-' }}</td>
                <td class="py-4">{{ $absen->jam_keluar ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-6 text-gray-500">Belum ada data absensi hari ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection