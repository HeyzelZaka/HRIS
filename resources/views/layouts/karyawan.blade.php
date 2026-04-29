<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan Dashboard - HRISign</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/css/karyawan-layout.css', 'resources/css/karyawan-profile.css', 'resources/js/app.js', 'resources/js/karyawan-profile.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
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

    <a href="/karyawan/gaji" 
       class="flex items-center gap-4 py-4 px-6 rounded-[20px] font-bold text-sm transition-all duration-300
       {{ Request::is('karyawan/gaji*') ? 'bg-white/20 text-white shadow-sm' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
        <i class="fas fa-file-invoice-dollar w-6 text-center"></i> 
        <span>Slip Gaji</span>
    </a>
</nav>
        <div class="mt-auto w-full pb-8">
                <button onclick="toggleLogoutModal()" class="flex items-center gap-4 py-4 px-6 text-white/70 hover:text-white transition-all text-sm font-bold uppercase tracking-widest w-full text-left">
                    <i class="fas fa-power-off w-6 text-center"></i> 
                    <span>Keluar</span>
                </button>
            </div>
        </aside>

        <main class="content-wrapper">
            <div class="user-profile">
                <div class="avatar-box">
                    <i class="fas fa-user text-xl"></i>
                </div>
                <div>
                    <h4 class="font-black text-gray-800 uppercase leading-none text-sm">{{ Auth::user()->role }}</h4>
                    <span class="text-xs font-bold text-[#00acc1]">{{ Auth::user()->name }}</span>
                </div>
            </div>

            @yield('content')
        </main>
    </div>

    <!-- Modal Logout -->
    <div id="logout-modal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="toggleLogoutModal()"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white p-10 rounded-[40px] shadow-2xl w-full max-w-md text-center">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-sign-out-alt text-3xl"></i>
            </div>
            <h3 class="text-2xl font-black text-gray-800 uppercase tracking-tighter mb-2">Konfirmasi Keluar</h3>
            <p class="text-gray-400 font-bold text-sm mb-10 uppercase tracking-widest leading-relaxed">Apakah anda yakin ingin keluar dari sistem HRISign?</p>
            
            <div class="flex gap-4">
                <button onclick="toggleLogoutModal()" class="flex-1 py-4 px-6 bg-gray-100 text-gray-500 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-gray-200 transition-all">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full py-4 px-6 bg-red-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-red-500/20 hover:bg-red-600 transition-all">
                        Ya, Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleLogoutModal() {
            const modal = document.getElementById('logout-modal');
            modal.classList.toggle('hidden');
        }
    </script>
</body>
</html>