<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRISign - Dashboard Admin</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hris-teal': '#00acc1',
                        'hris-gray-bg': '#f5f5f5',
                        'hris-gray-card': '#e0e0e0',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .modal-active { overflow: hidden; }
    </style>
</head>
<body class="bg-hris-gray-bg overflow-hidden">

    <div class="flex h-screen">
        <aside class="w-64 bg-hris-teal p-6 flex flex-col items-center shadow-xl z-10">
             <div class="logo-sidebar-container flex flex-col items-center justify-center pt-2 mb-6">
             <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg overflow-hidden p-3 border-4 border-white/50">
             <img src="{{ asset('images/HRIS.jpeg') }}" 
             alt="Logo HRISign" 
             class="w-full h-full object-contain">
    </div>
    <span class="text-white font-black text-2xl tracking-tighter uppercase mt-2">HRISign</span>
    </div>
            
            <nav class="flex flex-col space-y-3 px-6 flex-1">
        
            <a href="/admin/dashboard" 
               class="flex items-center gap-4 py-4 px-8 rounded-full font-bold text-sm transition-all duration-300
              {{ Request::is('admin/dashboard*') ? 'bg-white text-[#00acc1] shadow-lg' : 'text-white hover:bg-white/10' }}">
              <i class="fas fa-users w-6 text-center"></i> 
              <span>Dashboard</span>
               </a>

             <a href="/admin/karyawan" 
               class="flex items-center gap-4 py-4 px-8 rounded-full font-bold text-sm transition-all duration-300
              {{ Request::is('admin/karyawan*') ? 'bg-white text-[#00acc1] shadow-lg' : 'text-white hover:bg-white/10' }}">
              <i class="fas fa-users w-6 text-center"></i> 
              <span>Karyawan</span>
               </a>

                <a href="/admin/hrd" 
                class="flex items-center gap-4 py-4 px-8 rounded-full font-bold text-sm transition-all duration-300
              {{ Request::is('admin/hrd*') ? 'bg-white text-[#00acc1] shadow-lg' : 'text-white hover:bg-white/10' }}">
                <i class="fas fa-file-alt w-6 text-center"></i> 
                <span>HRD</span>
             </a>

              <a href="/admin/rekap" 
             class="flex items-center gap-4 py-4 px-8 rounded-full font-bold text-sm transition-all duration-300
                {{ Request::is('admin/rekap*') ? 'bg-white text-[#00acc1] shadow-lg' : 'text-white hover:bg-white/10' }}">
              <i class="fas fa-file-alt w-6 text-center"></i> 
                <span>Rekap</span>
             </a>

             <a href="/admin/slip-gaji" 
             class="flex items-center gap-4 py-4 px-8 rounded-full font-bold text-sm transition-all duration-300
              {{ Request::is('admin/slip-gaji*') ? 'bg-white text-[#00acc1] shadow-lg' : 'text-white hover:bg-white/10' }}">
              <i class="fas fa-file-invoice-dollar w-6 text-center"></i> 
             <span>Slip Gaji</span>
              </a>

</nav>

            <div class="mt-auto w-full">
                <button onclick="toggleLogoutModal()" class="flex items-center gap-3 py-3 px-6 text-white/70 hover:text-white transition-all text-xs font-bold uppercase tracking-widest w-full text-left">
                    <i class="fas fa-power-off"></i> Keluar
                </button>
            </div>
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="p-8 flex items-center justify-between bg-white/50 backdrop-blur-md border-b border-gray-200/50">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-full bg-gray-900 flex items-center justify-center text-white shadow-xl text-xl">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="font-black text-2xl text-gray-900 tracking-tight leading-none uppercase">ADMIN {{ Auth::user()->name }}</div>
                        <div class="flex items-center gap-3 mt-1">
                            <div class="flex items-center gap-2 px-3 py-1 bg-hris-teal/10 rounded-lg border border-hris-teal/20 text-[11px] font-bold text-hris-teal uppercase tracking-widest">
                                <i class="fas fa-clock animate-pulse"></i> <span id="clock-top">00:00</span>
                            </div>
                            <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest flex items-center gap-1">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Online
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 p-10 overflow-y-auto flex flex-col">
             @yield('content')
             </div>
         </main>
    </div>

    <!-- Modal Logout -->
    <div id="logout-modal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="toggleLogoutModal()"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white p-10 rounded-[40px] shadow-2xl w-full max-w-md text-center transform transition-all duration-300">
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

        function updateTopClock() {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            const clockElem = document.getElementById('clock-top');
            if(clockElem) clockElem.innerText = timeStr;
        }
        setInterval(updateTopClock, 1000);
        updateTopClock();
    </script>
    @vite(['resources/css/app.css', 'resources/js/dashboard.js'])
</body>
</html>