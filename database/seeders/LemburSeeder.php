<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lembur;
use App\Models\User;
use Carbon\Carbon;

class LemburSeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = User::where('role', 'karyawan')->get();
        $hrd       = User::where('role', 'hrd')->first();
        $statuses  = ['pending', 'disetujui', 'ditolak'];

        foreach ($karyawans as $karyawan) {
            $jumlah = rand(1, 3);
            for ($i = 0; $i < $jumlah; $i++) {
                $tanggal = Carbon::today()->subDays(rand(1, 20));
                $status  = $statuses[array_rand($statuses)];

                Lembur::create([
                    'user_id'       => $karyawan->id,
                    'tanggal'       => $tanggal->toDateString(),
                    'shift'         => $karyawan->shift ?? 'pagi',
                    'jam_mulai'     => '17:00:00',
                    'jam_selesai'   => '19:00:00',
                    'total_jam'     => 2.0,
                    'keterangan'    => 'Penyelesaian target produksi',
                    'status'        => $status,
                    'diproses_oleh' => $status !== 'pending' ? $hrd->id : null,
                    'diproses_at'   => $status !== 'pending' ? now() : null,
                ]);
            }
        }

        $this->command->info('✅ LemburSeeder selesai!');
    }
}