<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRD Portal - HRISign</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite([
        'resources/css/app.css', 
        'resources/css/karyawan-layout.css', 
        'resources/css/hrd-style.css', 
        'resources/js/karyawan-profile.js'
    ])
</head>
<body class="bg-[#F8FAFC]">
    <div class="flex">
        <aside class="w-72 bg-[#00acc1] fixed h-full p-8 flex flex-col shadow-2xl z-50">
             <div class="logo-sidebar-container flex flex-col items-center justify-center pt-2 mb-6">
             <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg overflow-hidden p-3 border-4 border-white/50">
                  <img src="{{ asset('images/HRIS.jpeg') }}" 
             alt="Logo HRISign" 
             class="w-full h-full object-contain">
    </div>,
                <span class="text-white font-black text-2xl tracking-tighter percase">HRISign</span>
            </div>

            <nav class="flex flex-col space-y-4">
                <a href="/hrd/absen" class="flex items-center justify-center py-3 px-6 rounded-full font-bold text-xs transition-all {{ Request::is('hrd/absen*') ? 'bg-white text-[#00acc1] shadow-md' : 'text-white hover:bg-white/10' }}">
                    Absen Karyawan
                </a>
                <a href="/hrd/cuti" class="flex items-center justify-center py-3 px-6 rounded-full font-bold text-xs transition-all {{ Request::is('hrd/cuti*') ? 'bg-white text-[#00acc1] shadow-md' : 'text-white hover:bg-white/10' }}">
                    Cuti Karyawan
                </a>
                <a href="/hrd/lembur" class="flex items-center justify-center py-3 px-6 rounded-full font-bold text-xs transition-all {{ Request::is('hrd/lembur*') ? 'bg-white text-[#00acc1] shadow-md' : 'text-white hover:bg-white/10' }}">
                    Lembur Karyawan
                </a>
            </nav>
        </aside>

        <main class="flex-1 ml-72 p-12">
            <div class="flex items-center gap-4 mb-12">
                <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center text-white">
                    <i class="fas fa-user text-xl"></i>
                </div>
                <div>
                    <h4 class="font-black text-black leading-none text-xl">HRD</h4>
                    <span class="text-sm font-bold text-black uppercase">SATRIA</span>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>