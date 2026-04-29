<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 560px; margin: auto; background: white; border-radius: 12px; overflow: hidden; }
        .header { background: #00acc1; padding: 30px; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 22px; }
        .body { padding: 30px; color: #333; }
        .footer { background: #f4f4f4; padding: 15px; text-align: center; font-size: 12px; color: #999; }
        .info-box { background: #e0f7fa; border-left: 4px solid #00acc1; padding: 15px; border-radius: 4px; margin: 20px 0; }
    </style>
</head>
<body>
<div class="container">
    <div class="header"><h1>🎉 Selamat Datang di HRIS</h1></div>
    <div class="body">
        <p>Halo, <strong>{{ $user->name }}</strong>!</p>
        <p>Akun Anda di sistem HRIS telah berhasil dibuat.</p>
        <div class="info-box">
            <strong>📧 Email:</strong> {{ $user->email }}<br>
            <strong>👤 Jabatan:</strong> {{ $user->jabatan ?? '-' }}<br>
            <strong>🏢 Departemen:</strong> {{ $user->departemen ?? '-' }}<br>
            <strong>🔑 Role:</strong> {{ ucfirst($user->role) }}
        </div>
        <p>Gunakan email dan password yang sudah Anda daftarkan untuk masuk ke sistem.</p>
    </div>
    <div class="footer">&copy; {{ date('Y') }} HRIS System. All rights reserved.</div>
</div>
</body>
</html>