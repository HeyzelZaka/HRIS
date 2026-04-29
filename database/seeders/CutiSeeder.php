<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuti;
use App\Models\User;
use Carbon\Carbon;

class CutiSeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = User::where('role', 'karyawan')->get();
        $hrd       = User::where('role', 'hrd')->first();
        $jenisCuti = ['tahunan', 'sakit', 'darurat'];
        $statuses  = ['pending', 'disetujui', 'ditolak'];

        foreach ($karyawans as $karyawan) {
            $jumlah = rand(1, 2);
            for ($i = 0; $i < $jumlah; $i++) {
                $mulai   = Carbon::today()->subDays(rand(5, 30));
                $selesai = $mulai->copy()->addDays(rand(1, 3));
                $status  = $statuses[array_rand($statuses)];

                Cuti::create([
                    'user_id'         => $karyawan->id,
                    'jenis_cuti'      => $jenisCuti[array_rand($jenisCuti)],
                    'tanggal_mulai'   => $mulai->toDateString(),
                    'tanggal_selesai' => $selesai->toDateString(),
                    'total_hari'      => $mulai->diffInWeekdays($selesai) + 1,
                    'alasan'          => 'Keperluan pribadi dan keluarga',
                    'status'          => $status,
                    'catatan_hrd'     => $status !== 'pending' ? ($status === 'disetujui' ? 'Disetujui' : 'Tidak memenuhi syarat') : null,
                    'diproses_oleh'   => $status !== 'pending' ? $hrd->id : null,
                    'diproses_at'     => $status !== 'pending' ? now() : null,
                ]);
            }
        }

        $this->command->info('✅ CutiSeeder selesai!');
    }
}