<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tanggal', 'shift', 'jam_mulai', 'jam_selesai',
        'total_jam', 'keterangan', 'status', 'diproses_oleh', 'diproses_at',
    ];

    protected $casts = [
        'tanggal'     => 'date',
        'diproses_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diprosesByUser()
    {
        return $this->belongsTo(User::class, 'diproses_oleh');
    }
}