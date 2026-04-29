<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 560px; margin: auto; background: white; border-radius: 12px; overflow: hidden; }
        .header-approve { background: #16a34a; padding: 25px; text-align: center; }
        .header-reject  { background: #dc2626; padding: 25px; text-align: center; }
        .header-approve h1, .header-reject h1 { color: white; margin: 0; font-size: 20px; }
        .body { padding: 30px; color: #333; }
        .footer { background: #f4f4f4; padding: 15px; text-align: center; font-size: 12px; color: #999; }
        .info-box { background: #f9f9f9; border: 1px solid #eee; padding: 15px; border-radius: 8px; margin: 15px 0; }
        .info-box p { margin: 5px 0; }
    </style>
</head>
<body>
<div class="container">
    @if($lembur->status === 'disetujui')
    <div class="header-approve"><h1>✅ Lembur Anda Disetujui</h1></div>
    @else
    <div class="header-reject"><h1>❌ Lembur Anda Ditolak</h1></div>
    @endif
    <div class="body">
        <p>Halo, <strong>{{ $lembur->user->name }}</strong>!</p>
        @if($lembur->status === 'disetujui')
            <p>Pengajuan lembur Anda telah <strong>disetujui</strong> oleh HRD.</p>
        @else
            <p>Mohon maaf, pengajuan lembur Anda <strong>tidak dapat disetujui</strong>.</p>
        @endif
        <div class="info-box">
            <p><strong>Tanggal:</strong> {{ $lembur->tanggal->format('d F Y') }}</p>
            <p><strong>Shift:</strong> {{ ucfirst($lembur->shift) }}</p>
            <p><strong>Jam:</strong> {{ $lembur->jam_mulai }} – {{ $lembur->jam_selesai }}</p>
            <p><strong>Total Jam:</strong> {{ $lembur->total_jam }} jam</p>
            <p><strong>Keterangan:</strong> {{ $lembur->keterangan ?? '-' }}</p>
        </div>
    </div>
    <div class="footer">&copy; {{ date('Y') }} HRIS System. All rights reserved.</div>
</div>
</body>
</html>