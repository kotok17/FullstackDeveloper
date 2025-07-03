<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusUsulanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('status_usulans')->insert([
            ['id' => 1, 'nama' => 'Menunggu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'Disetujui', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama' => 'Ditolak', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
