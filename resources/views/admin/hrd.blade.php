@extends('layouts.admin')

@section('content')
@vite(['resources/css/hrd-table.css'])

<div class="min-h-full flex flex-col">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tight">Manajemen HRD</h2>
            <p class="text-sm text-gray-400">Daftar pengelola sistem HRISign</p>
        </div>
        <button class="bg-hris-teal text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-lg hover:bg-cyan-700 transition-all flex items-center gap-2">
            <i class="fas fa-plus-circle"></i> Tambah HRD
        </button>
    </div>

    <div class="hrd-container">
        <table class="hrd-table w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama HRD</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hrds as $hrd)
                <tr>
                    <td class="font-bold text-gray-400">{{ $hrd->id }}</td>
                    <td class="font-black text-gray-700">{{ $hrd->name }}</td>
                    <td class="text-center text-gray-500">{{ $hrd->email }}</td>
                    <td class="text-center">
                        <span class="badge-hrd">Aktif</span>
                    </td>
                    <td>
                        <div class="flex justify-center gap-2">
                            <button class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 hover:bg-hris-teal hover:text-white transition-all"><i class="fas fa-edit text-xs"></i></button>
                            <button class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 hover:bg-red-500 hover:text-white transition-all"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection