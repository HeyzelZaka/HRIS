<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRISign - Register</title>
    @vite(['resources/css/app.css'])
</head>
<body>

    <div class="login-container">
        <div class="glass-card">
            
            <div class="user-icon-circle">
                👤
            </div>
            
            <h2 class="login-title">REGISTER</h2>

            <form action="#" method="POST">
                @csrf
                <input type="email" name="email" class="input-box" placeholder="masukan email" required>
                <input type="password" name="password" class="input-box" placeholder="masukan password" required>
                <input type="password" name="password_confirmation" class="input-box" placeholder="ulangi password" required>
                
                <button type="submit" class="btn-login">
                    <span>➜</span> Register
                </button>

        <div style="margin-top: 20px;">
            <p style="color: white; font-size: 13px; opacity: 0.9;">
                 Sudah punya akun? 
                <a href="{{ route('login') }}" style="color: #00acc1; font-weight: bold; text-decoration: none; border-bottom: 1px dashed #00acc1;">
                         Masuk di sini
        </a>
    </p>
</div>
            </form>

        </div>
    </div>

</body>
</html>