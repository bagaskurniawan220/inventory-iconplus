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
            ['name' => 'Admin IconPlus', 'password' => 'admin12345', 'role' => 'admin']
        );

        User::updateOrCreate(
            ['email' => 'petugas@iconplus.test'],
            ['name' => 'Petugas Gudang', 'password' => 'petugas12345', 'role' => 'petugas']
        );
    }
}
