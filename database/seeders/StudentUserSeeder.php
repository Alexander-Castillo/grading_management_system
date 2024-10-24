<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si ya existe un admin
            if (!User::where('email', 'student@student.com')->exists()) {
                User::create([
                    'name' => 'student1',
                    'email' => 'student@student.com',
                    'password' => Hash::make('student'), // Cambia la contraseña por una segura
                    'role' => 'student',
                ]);
        }
    }
}
