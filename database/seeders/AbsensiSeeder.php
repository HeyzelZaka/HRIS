<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = User::where('role', 'karyawan')->get();
        $today     = Carbon::today();
        $start     = $today->copy()->startOfMonth();
        $statusOptions = ['hadir', 'hadir', 'hadir', 'hadir', 'terlambat', 'izin', 'sakit'];

        foreach ($karyawans as $karyawan) {
            $current = $start->copy();
            while ($current->lte($today)) {
                if ($current->isWeekend()) {
                    $current->addDay();
                    continue;
                }
                $status = $statusOptions[array_rand($statusOptions)];
                Absensi::create([
                    'user_id'    => $karyawan->id,
                    'tanggal'    => $current->toDateString(),
                    'jam_masuk'  => in_array($status, ['hadir', 'terlambat']) ? ($status === 'terlambat' ? '08:30:00' : '07:55:00') : null,
                    'jam_keluar' => in_array($status, ['hadir', 'terlambat']) ? '17:00:00' : null,
                    'status'     => $status,
                    'keterangan' => $status === 'izin' ? 'Keperluan keluarga' : ($status === 'sakit' ? 'Sakit demam' : null),
                ]);
                $current->addDay();
            }
        }

        $this->command->info('✅ AbsensiSeeder selesai!');
    }
}