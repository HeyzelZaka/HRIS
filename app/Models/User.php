<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
        'role', 'jabatan', 'departemen', 'shift', 'no_hp', 'foto',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    public function cutis()
    {
        return $this->hasMany(Cuti::class);
    }

    public function lemburs()
    {
        return $this->hasMany(Lembur::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isHrd()
    {
        return $this->role === 'hrd';
    }

    public function isKaryawan()
    {
        return $this->role === 'karyawan';
    }

    public function absenBulanIni()
    {
        return $this->absensis()
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year);
    }
}