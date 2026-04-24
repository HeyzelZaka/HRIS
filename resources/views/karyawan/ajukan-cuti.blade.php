@extends('layouts.karyawan')
@section('content')
@vite(['resources/css/karyawan-cuti.css'])

<div class="border border-gray-200">
    <div class="card-cuti-header text-white">Form Pengajuan Cuti</div>
    <div class="box-abu">
        <form class="grid grid-cols-2 gap-8">
            <div class="space-y-4">
                <div>
                    <label class="block font-bold text-sm mb-1">Jenis Cuti</label>
                    <select class="input-cuti"><option>Tahunan</option><><option>Sakit</option></select>
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1">Tanggal Mulai</label>
                    <input type="date" class="input-cuti">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1">Tanggal Selesai</label>
                    <input type="date" class="input-cuti">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1">Total Hari</label>
                    <input type="text" class="input-cuti" placeholder="... Hari">
                </div>
            </div>

            <div>
                <label class="block font-bold text-sm mb-1">Upload Lampiran <span class="text-gray-400">(opsional)</span></label>
                <div class="upload-area">
                    <i class="fas fa-cloud-upload-alt text-4xl mb-2"></i>
                    <p class="text-[10px] mb-2 text-gray-500 font-bold">Upload File (JPG, PDF)</p>
                    <button type="button" class="bg-teal-100 text-[#00acc1] px-4 py-1 rounded-md font-bold">+ Unggah File</button>
                </div>
            </div>

            <div class="col-span-2">
                <label class="block font-bold text-sm mb-1">Alasan</label>
                <textarea class="input-cuti h-24" placeholder="Tulis alasan pengajuan cuti"></textarea>
            </div>

            <div class="col-span-2 flex justify-end gap-4 mt-4">
                <button type="button" class="text-gray-500 font-bold">Batal</button>
                <button type="button" class="bg-[#00acc1] text-white px-8 py-2 rounded-lg font-bold">Ajukan Cuti</button>
            </div>
        </form>
    </div>
</div>
@endsection