<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'       => 'Administrator',
            'email'      => 'admin@hris.com',
            'password'   => Hash::make('admin123'),
            'role'       => 'admin',
            'jabatan'    => 'System Administrator',
            'departemen' => 'IT',
            'shift'      => 'pagi',
            'no_hp'      => '08111000001',
        ]);

        User::create([
            'name'       => 'Siti Rahayu',
            'email'      => 'hrd@hris.com',
            'password'   => Hash::make('hrd12345'),
            'role'       => 'hrd',
            'jabatan'    => 'HRD Manager',
            'departemen' => 'Human Resource',
            'shift'      => 'pagi',
            'no_hp'      => '08111000002',
        ]);

        $karyawanData = [
            ['name' => 'Budi Santoso',      'email' => 'budi@hris.com',   'jabatan' => 'Operator Produksi', 'departemen' => 'Produksi',      'shift' => 'pagi',  'no_hp' => '08111000003'],
            ['name' => 'Priska Wulandari',  'email' => 'priska@hris.com', 'jabatan' => 'Operator Produksi', 'departemen' => 'Produksi',      'shift' => 'pagi',  'no_hp' => '08111000004'],
            ['name' => 'Andi Firmansyah',   'email' => 'andi@hris.com',   'jabatan' => 'Teknisi',           'departemen' => 'Maintenance',   'shift' => 'siang', 'no_hp' => '08111000005'],
            ['name' => 'Dewi Lestari',      'email' => 'dewi@hris.com',   'jabatan' => 'Staff Administrasi','departemen' => 'Administrasi',  'shift' => 'pagi',  'no_hp' => '08111000006'],
            ['name' => 'Riko Prasetyo',     'email' => 'riko@hris.com',   'jabatan' => 'Operator Gudang',   'departemen' => 'Logistik',      'shift' => 'malam', 'no_hp' => '08111000007'],
        ];

        foreach ($karyawanData as $data) {
            User::create([
                'name'       => $data['name'],
                'email'      => $data['email'],
                'password'   => Hash::make('karyawan123'),
                'role'       => 'karyawan',
                'jabatan'    => $data['jabatan'],
                'departemen' => $data['departemen'],
                'shift'      => $data['shift'],
                'no_hp'      => $data['no_hp'],
            ]);
        }

        $this->command->info('✅ UserSeeder selesai!');
        $this->command->info('   Admin    → admin@hris.com  / admin123');
        $this->command->info('   HRD      → hrd@hris.com    / hrd12345');
        $this->command->info('   Karyawan → budi@hris.com   / karyawan123');
    }
}