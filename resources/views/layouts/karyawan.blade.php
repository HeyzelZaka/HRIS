<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan Dashboard - HRISign</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/css/karyawan-layout.css', 'resources/css/karyawan-profile.css', 'resources/js/app.js', 'resources/js/karyawan-profile.js'])
</head>
<body class="bg-[#F8FAFC]">
    <div class="flex">
        <aside class="sidebar-fixed">
        <div class="logo-sidebar-container flex flex-col items-center justify-center pt-2 mb-6">
     <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg overflow-hidden p-3 border-4 border-white/50">
        <img src="{{ asset('images/HRIS.jpeg') }}" 
             alt="Logo HRISign" 
             class="w-full h-full object-contain">
    </div>
    
    <span class="text-white font-black text-2xl tracking-tighter uppercase mt-4 block">HRISIGN</span>
</div>

            <nav class="flex flex-col space-y-4">
    
                <a href="/karyawan/dashboard" 
                 class="flex items-center gap-4 py-4 px-6 rounded-[20px] font-bold text-sm transition-all duration-300 
                 {{ Request::is('karyawan/dashboard') ? 'bg-white/20 text-white shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                 <i class="fas fa-home w-6 text-center"></i> 
                 <span>Dashboard</span>
                 </a>

                    <a href="/karyawan/absensi" 
                 class="flex items-center gap-4 py-4 px-6 rounded-[20px] font-bold text-sm transition-all duration-300
                    {{ Request::is('karyawan/absensi') ? 'bg-white/20 text-white shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                 <i class="fas fa-camera w-6 text-center"></i> 
                 <span>Absensi</span>
                 </a>

                  <a href="/karyawan/cuti" 
                  class="flex items-center gap-4 py-4 px-6 rounded-[20px] font-bold text-sm transition-all duration-300
                 {{ Request::is('karyawan/cuti*') ? 'bg-white/20 text-white shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                  <i class="fas fa-calendar-alt w-6 text-center"></i> 
                    <span>Pengajuan Cuti</span>
                 </a>

    <a href="#" 
       class="flex items-center gap-4 py-4 px-6 rounded-[20px] font-bold text-sm transition-all duration-300
       {{ Request::is('karyawan/slip-gaji') ? 'bg-white/20 text-white shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
        <i class="fas fa-file-invoice-dollar w-6 text-center"></i> 
        <span>Slip Gaji</span>
    </a>
</nav>
        <div class="mt-auto w-full">
                <a href="{{ route('login') }}" class="flex items-center gap-3 py-3 px-6 text-white/50 hover:text-red-200 transition-all text-xs font-bold uppercase tracking-widest">
                    <i class="fas fa-power-off"></i> Keluar
                </a>
            </div>
        </aside>

        <main class="content-wrapper">
            <div class="user-profile">
                <div class="avatar-box">
                    <i class="fas fa-user text-xl"></i>
                </div>
                <div>
                    <h4 class="font-black text-gray-800 uppercase leading-none text-sm">User</h4>
                    <span class="text-xs font-bold text-[#00acc1]">PRISKA</span>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>