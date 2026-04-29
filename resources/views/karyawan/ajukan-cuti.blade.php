@extends('layouts.karyawan')
@section('content')
@vite(['resources/css/karyawan-cuti.css'])

<div class="border border-gray-200 rounded-3xl overflow-hidden shadow-sm">
    <div class="card-cuti-header bg-[#00acc1] text-white p-4 font-black tracking-widest text-center">FORM PENGAJUAN CUTI</div>
    <div class="box-abu p-8 bg-white">
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6 font-bold">
                <ul class="list-disc list-inside ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('karyawan.cuti.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block font-bold text-sm mb-1 text-gray-700">Jenis Cuti</label>
                    <select name="jenis_cuti" class="input-cuti w-full border-gray-300 rounded-xl p-3 focus:ring-[#00acc1] focus:border-[#00acc1]" required>
                        <option value="tahunan">Tahunan</option>
                        <option value="sakit">Sakit</option>
                        <option value="melahirkan">Melahirkan</option>
                        <option value="darurat">Darurat</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1 text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="input-cuti w-full border-gray-300 rounded-xl p-3 focus:ring-[#00acc1] focus:border-[#00acc1]" required>
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1 text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="input-cuti w-full border-gray-300 rounded-xl p-3 focus:ring-[#00acc1] focus:border-[#00acc1]" required>
                </div>
            </div>

            <div>
                <label class="block font-bold text-sm mb-1 text-gray-700">Upload Lampiran <span class="text-gray-400">(opsional)</span></label>
                <div class="upload-area border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:bg-gray-50 transition cursor-pointer relative">
                    <input type="file" name="lampiran" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <i class="fas fa-cloud-upload-alt text-4xl mb-2 text-gray-400"></i>
                    <p class="text-[10px] mb-2 text-gray-500 font-bold">Upload File (JPG, PNG, PDF)</p>
                    <span class="bg-teal-100 text-[#00acc1] px-4 py-1 rounded-md font-bold text-xs inline-block mt-2">Pilih File</span>
                </div>
            </div>

            <div class="col-span-1 md:col-span-2">
                <label class="block font-bold text-sm mb-1 text-gray-700">Alasan</label>
                <textarea name="alasan" class="input-cuti w-full h-24 border-gray-300 rounded-xl p-3 focus:ring-[#00acc1] focus:border-[#00acc1]" placeholder="Tulis alasan pengajuan cuti..." required></textarea>
            </div>

            <div class="col-span-1 md:col-span-2 flex justify-end gap-4 mt-4">
                <a href="{{ route('karyawan.cuti') }}" class="text-gray-500 font-bold px-6 py-3 hover:text-gray-700 transition">Batal</a>
                <button type="submit" class="bg-[#00acc1] text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-cyan-700 transition">Ajukan Cuti</button>
            </div>
        </form>
    </div>
</div>
@endsection