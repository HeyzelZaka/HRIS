<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gaji;
use App\Models\User;
use Carbon\Carbon;

class GajiSeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = User::where('role', 'karyawan')->get();
        
        foreach ($karyawans as $user) {
            // Gaji bulan April 2026
            Gaji::create([
                'user_id' => $user->id,
                'bulan' => 4,
                'tahun' => 2026,
                'gaji_pokok' => 5000000,
                'tunjangan' => 500000,
                'potongan' => 100000,
                'total_gaji' => 5400000,
                'status' => 'dibayar',
                'dibayar_at' => Carbon::now(),
            ]);

            // Gaji bulan Maret 2026
            Gaji::create([
                'user_id' => $user->id,
                'bulan' => 3,
                'tahun' => 2026,
                'gaji_pokok' => 5000000,
                'tunjangan' => 450000,
                'potongan' => 50000,
                'total_gaji' => 5400000,
                'status' => 'dibayar',
                'dibayar_at' => Carbon::now()->subMonth(),
            ]);
        }
        
        echo "✅ GajiSeeder selesai!\n";
    }
}