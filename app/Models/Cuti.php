<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'jenis_cuti', 'tanggal_mulai', 'tanggal_selesai',
        'total_hari', 'alasan', 'lampiran', 'status',
        'catatan_hrd', 'diproses_oleh', 'diproses_at',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
        'diproses_at'     => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diprosesByUser()
    {
        return $this->belongsTo(User::class, 'diproses_oleh');
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
}