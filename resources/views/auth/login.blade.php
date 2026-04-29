<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HRISign</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/login.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');
        
        .logo-area {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-area img {
            width: 90px;
            height: 90px;
            border-radius: 24px;
            object-fit: cover;
            margin-bottom: 15px;
            border: 4px solid rgba(0, 172, 193, 0.3);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .logo-area h2 {
            color: #00acc1;
            font-weight: 800;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-size: 1.8rem;
            margin: 0;
            tracking-tighter;
        }
        .login-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 5px;
        }
        .glass-card {
            padding: 3rem 2.5rem !important;
        }
    </style>
</head>
<body class="login-container">

    <div class="glass-card">
        <div class="logo-area">
            <img src="{{ asset('images/HRIS.jpeg') }}" alt="HRIS Logo">
            <h2>HRISign</h2>
            <p class="login-subtitle">Human Resource Information System</p>
        </div>

        @if(session('loginError'))
            <div style="background: rgba(255,68,68,0.15); color: #ff4444; padding: 12px; border-radius: 15px; margin-bottom: 20px; font-size: 11px; font-weight: bold; border: 1px solid rgba(255,68,68,0.2);">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('loginError') }}
            </div>
        @endif

        @if(session('success'))
            <div style="background: rgba(0,200,81,0.15); color: #00c851; padding: 12px; border-radius: 15px; margin-bottom: 20px; font-size: 11px; font-weight: bold; border: 1px solid rgba(0,200,81,0.2);">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            
            <div style="text-align: left; margin-bottom: 20px;">
                <label style="color: #00acc1; font-[10px]; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-left: 15px; margin-bottom: 8px; display: block;">Email Address</label>
                <input type="email" name="email" class="input-box" placeholder="name@company.com" value="{{ old('email') }}" required autofocus style="margin-bottom: 0;">
                @error('email')
                    <p style="color: #ff4444; font-size: 10px; text-align: left; margin: 5px 0 0 15px; font-weight: bold;">{{ $message }}</p>
                @enderror
            </div>

            <div style="text-align: left; margin-bottom: 30px;">
                <label style="color: #00acc1; font-[10px]; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-left: 15px; margin-bottom: 8px; display: block;">Password</label>
                <input type="password" name="password" class="input-box" placeholder="••••••••" required style="margin-bottom: 0;">
                @error('password')
                    <p style="color: #ff4444; font-size: 10px; text-align: left; margin: 5px 0 0 15px; font-weight: bold;">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn-login">
                 <span>➜</span> MASUK KE SISTEM
            </button>

            <div style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); pt-20">
                <p style="color: rgba(255,255,255,0.4); font-size: 11px; font-weight: bold; margin-bottom: 10px; margin-top: 20px;">BELUM PUNYA AKUN?</p>
                <a href="{{ route('register') }}" style="color: #00acc1; font-weight: 800; text-decoration: none; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; background: rgba(0,172,193,0.1); padding: 8px 20px; border-radius: 50px; display: inline-block;">
                     Daftar Sekarang
                </a>
            </div>
        </form>
    </div>

</body>
</html>