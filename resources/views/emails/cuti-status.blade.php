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
        .catatan { background: #fff3cd; border-left: 4px solid #f59e0b; padding: 12px; border-radius: 4px; }
    </style>
</head>
<body>
<div class="container">
    @if($cuti->status === 'disetujui')
    <div class="header-approve"><h1>✅ Cuti Anda Disetujui</h1></div>
    @else
    <div class="header-reject"><h1>❌ Cuti Anda Ditolak</h1></div>
    @endif
    <div class="body">
        <p>Halo, <strong>{{ $cuti->user->name }}</strong>!</p>
        @if($cuti->status === 'disetujui')
            <p>Pengajuan cuti Anda telah <strong>disetujui</strong> oleh HRD.</p>
        @else
            <p>Mohon maaf, pengajuan cuti Anda <strong>ditolak</strong>.</p>
        @endif
        <div class="info-box">
            <p><strong>Jenis Cuti:</strong> {{ ucfirst($cuti->jenis_cuti) }}</p>
            <p><strong>Tanggal Mulai:</strong> {{ $cuti->tanggal_mulai->format('d F Y') }}</p>
            <p><strong>Tanggal Selesai:</strong> {{ $cuti->tanggal_selesai->format('d F Y') }}</p>
            <p><strong>Total Hari:</strong> {{ $cuti->total_hari }} hari</p>
            <p><strong>Alasan:</strong> {{ $cuti->alasan }}</p>
        </div>
        @if($cuti->catatan_hrd)
        <div class="catatan"><strong>📝 Catatan HRD:</strong> {{ $cuti->catatan_hrd }}</div>
        @endif
    </div>
    <div class="footer">&copy; {{ date('Y') }} HRIS System. All rights reserved.</div>
</div>
</body>
</html>