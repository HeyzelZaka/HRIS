<?php

namespace App\Mail;

use App\Models\Cuti;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CutiStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cuti;

    public function __construct(Cuti $cuti)
    {
        $this->cuti = $cuti;
    }

    public function build()
    {
        $subjek = $this->cuti->status === 'disetujui'
            ? '✅ Pengajuan Cuti Anda Disetujui'
            : '❌ Pengajuan Cuti Anda Ditolak';

        return $this->subject($subjek)->view('emails.cuti-status');
    }
}