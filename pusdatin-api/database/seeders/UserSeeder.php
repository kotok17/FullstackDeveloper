<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Bappeda',
            'email' => 'bappeda@bappeda.go.id',  // ← INI!
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Wilayah',
            'email' => 'user@bappeda.go.id',  // ← INI!
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
