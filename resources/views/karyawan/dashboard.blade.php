@extends('layouts.karyawan')

@section('content')
<div class="space-y-10">
    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100 flex justify-between items-center relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-black text-gray-800 tracking-tight">Selamat Datang, Priska! 👋</h1>
            <p class="text-gray-400 font-bold text-sm mt-2 uppercase tracking-widest">Operator Produksi • Shift Pagi</p>
        </div>
        <div class="text-right relative z-10">
            <div id="clock" class="text-4xl font-black text-[#00acc1] tabular-nums tracking-tighter">00:00:00</div>
            <p class="text-xs font-bold text-gray-400 uppercase mt-1 tracking-widest">Kamis, 23 April 2026</p>
        </div>
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-[#00acc1]/5 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-[40px] shadow-sm border-b-8 border-[#00acc1]">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 bg-[#00acc1]/10 rounded-2xl flex items-center justify-center text-[#00acc1]">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Bulan Ini</span>
            </div>
            <div class="text-3xl font-black text-gray-800">20 / 22</div>
            <p class="text-xs font-bold text-gray-400 mt-1 uppercase">Total Kehadiran</p>
        </div>

        <div class="bg-white p-8 rounded-[40px] shadow-sm border-b-8 border-orange-400">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-500">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Tersisa</span>
            </div>
            <div class="text-3xl font-black text-gray-800">12 Hari</div>
            <p class="text-xs font-bold text-gray-400 mt-1 uppercase">Jatah Cuti Tahunan</p>
        </div>

        <div class="bg-white p-8 rounded-[40px] shadow-sm border-b-8 border-purple-400">
            <div class="flex justify-between items-start mb-6">
                <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-500">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Status</span>
            </div>
            <div class="text-xl font-black text-gray-800 uppercase">SUDAH TERBIT</div>
            <p class="text-xs font-bold text-gray-400 mt-1 uppercase">Gaji April 2026</p>
        </div>
    </div>

    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100">
        <h3 class="text-lg font-black text-gray-800 uppercase tracking-tight mb-8">Riwayat Presensi Terbaru</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-6 bg-gray-50 rounded-3xl border border-gray-100 group hover:bg-[#00acc1]/5 transition-all">
                <div class="flex items-center gap-6">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <div>
                        <p class="text-sm font-black text-gray-700">Clock In - Masuk Kerja</p>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Sesuai Jadwal</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-black text-gray-700">08:02:15</p>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Hari Ini</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        document.getElementById('clock').innerText = timeStr;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
@endsection