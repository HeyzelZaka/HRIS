@extends('layouts.admin')

@section('content')
{{-- Memanggil file CSS khusus yang sudah dipisah --}}
@vite(['resources/css/karyawan-table.css'])

<div class="min-h-full flex flex-col">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Data Karyawan</h2>
            <p class="text-sm text-gray-400">Daftar anggota tim HRISign saat ini</p>
        </div>
        <button class="bg-hris-teal text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-lg shadow-hris-teal/30 hover:bg-cyan-700 transition-all flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Karyawan
        </button>
    </div>

    <div class="hris-table-container">
        <table class="hris-table w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-bold text-gray-400">1</td>
                    <td class="font-black text-gray-700">Jokowi</td>
                    <td class="text-center">
                        <span class="badge-status-active">Aktif</span>
                    </td>
                    <td>
                        <div class="btn-action-group">
                            <button class="btn-action-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-action-icon delete" title="Hapus"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="font-bold text-gray-400">2</td>
                    <td class="font-black text-gray-700">Prabowo</td>
                    <td class="text-center">
                        <span class="badge-status-active">Aktif</span>
                    </td>
                    <td>
                        <div class="btn-action-group">
                            <button class="btn-action-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn-action-icon delete" title="Hapus"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-auto pt-10">
        <div class="inline-flex items-center gap-6 p-5 bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="w-10 h-10 rounded-xl bg-hris-teal/10 text-hris-teal flex items-center justify-center">
                <i class="fas fa-info-circle text-xs"></i>
            </div>
            <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                Menampilkan <span class="text-gray-800">2 Entri</span> Data
            </div>
        </div>
    </div>

</div>
@endsection