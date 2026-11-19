<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // updateOrCreate: kalau emailnya sudah ada, datanya diperbarui, tidak dobel
        User::updateOrCreate(
            ['email' => 'admin@iconplus.test'],
            ['name' => 'Admin iconplus', 'password' => 'bagas12345', 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'petugas@iconplus.test'],
            ['name' => 'Petugas gudang', 'password' => 'bagas12345', 'role' => 'petugas']
        );
    }
}
