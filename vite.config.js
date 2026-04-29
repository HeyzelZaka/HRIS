import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/login.js',
                'resources/js/dashboard.js',
                'resources/css/karyawan-table.css',
                'resources/css/hrd-table.css',
                'resources/css/karyawan-style.css',
                'resources/css/karyawan-layout.css',
                'resources/css/karyawan-absensi.css',
                'resources/css/karyawan-profile.css', 
                'resources/js/karyawan-profile.js',
            //    'resources/css/karyawan.ajukan-cuti.css',
               'resources/css/hrd-style.css',

            ],
            refresh: true,
        }),
    ],
});