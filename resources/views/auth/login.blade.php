<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRISign - Login</title>
    @vite(['resources/css/app.css', 'resources/js/login.js'])
</head>
<body>

    <div class="login-container">
        <div class="glass-card">
            
            <div class="user-icon-circle">
                👤
            </div>
            
            <h2 class="login-title">LOGIN</h2>

            <div class="role-tabs">
                 <button type="button" id="btn-user" class="tab active" onclick="switchRole('user')">user</button>
                  <button type="button" id="btn-admin" class="tab" onclick="switchRole('admin')">admin</button>
            </div>

            <input type="hidden" name="role" id="selected-role" value="user">

            <form action="{{ route('dashboard') }}" method="GET">
    @csrf
                <input type="email" class="input-box" placeholder="email" required>
                <input type="password" class="input-box" placeholder="password" required>
                
                <button type="submit" class="btn-login">
                     <span>➜</span> LOGIN
                </button>
                <div style="margin-top: 15px;">
                    <a href="{{ route('register') }}" style="color: #00acc1; font-weight: bold; text-decoration: none;">
                         Daftar sekarang
                    </a>
                </div>
            
            </form>

        </div>
    </div>

</body>
</html>