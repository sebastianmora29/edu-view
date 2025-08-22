<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fernando Aguirre',
            'email' => 'profesor@email.com',
            'password' => Hash::make('ferHenry'), // Cambia la contraseña si quieres
            'role' => 'profesor',
        ]);
    }
}
