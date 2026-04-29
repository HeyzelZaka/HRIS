<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'hrd', 'karyawan'])->default('karyawan')->after('email');
            $table->string('jabatan')->nullable()->after('role');
            $table->string('departemen')->nullable()->after('jabatan');
            $table->string('shift')->nullable()->after('departemen');
            $table->string('no_hp')->nullable()->after('shift');
            $table->string('foto')->nullable()->after('no_hp');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'jabatan', 'departemen', 'shift', 'no_hp', 'foto']);
        });
    }
};