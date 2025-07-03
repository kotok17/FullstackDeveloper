<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('periodes')->insert([
            ['id' => 1, 'tahun' => '2023', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'tahun' => '2024', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'tahun' => '2025', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
