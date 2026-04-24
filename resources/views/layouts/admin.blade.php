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
    </div>,
    <span class="text-white font-black text-2xl tracking-tighter percase">HRISign</span>
    </div>
            
            <nav class="flex flex-col space-y-3 px-6 flex-1">
        
             <a href="/admin/dashboard" 
                class="flex items-center gap-4 py-3 px-6 rounded-full font-bold text-sm bg-white text-[#00acc1] shadow-md transition-all">
                <i class="fas fa-th-large w-5"></i> 
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
                <a href="{{ route('login') }}" class="flex items-center gap-3 py-3 px-6 text-white/50 hover:text-red-200 transition-all text-xs font-bold uppercase tracking-widest">
                    <i class="fas fa-power-off"></i> Keluar
                </a>
            </div>
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="p-8 flex items-center justify-between bg-white/50 backdrop-blur-md border-b border-gray-200/50">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-full bg-gray-900 flex items-center justify-center text-white shadow-xl text-xl">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="flex flex-col gap-1">
                        <div class="font-black text-2xl text-gray-900 tracking-tight leading-none uppercase">ADMIN PRISKA INTAN</div>
                        <div class="flex items-center gap-3 mt-1">
                            <div class="flex items-center gap-2 px-3 py-1 bg-hris-teal/10 rounded-lg border border-hris-teal/20 text-[11px] font-bold text-hris-teal uppercase tracking-widest">
                                <i class="fas fa-clock animate-pulse"></i> <span id="clock">00:00</span>
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
@vite(['resources/css/app.css', 'resources/js/dashboard.js'])
</body>
</html>