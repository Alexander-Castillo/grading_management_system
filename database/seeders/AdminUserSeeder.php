<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si ya existe un admin
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin Root',
                'email' => 'admin@example.com',
                'password' => Hash::make('Root'), // Cambia la contraseña por una segura
                'role' => 'admin',
            ]);
    }
}
}