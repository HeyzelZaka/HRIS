<?php

namespace App\Mail;

use App\Models\Lembur;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LemburStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lembur;

    public function __construct(Lembur $lembur)
    {
        $this->lembur = $lembur;
    }

    public function build()
    {
        $subjek = $this->lembur->status === 'disetujui'
            ? '✅ Pengajuan Lembur Anda Disetujui'
            : '❌ Pengajuan Lembur Anda Ditolak';

        return $this->subject($subjek)->view('emails.lembur-status');
    }
}