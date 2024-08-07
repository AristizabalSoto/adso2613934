<?php

// ubicación: gameapp/database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Crear un usuario administrador
        User::create([
            'document' => '1053810807',
            'fullname' => 'Jonathan Aristizabal',
            'gender' => 'Male',
            'birthdate' => '1990-12-30', // Formato Y-m-d
            'phone' => '3187542709',
            'email' => 'martinrobinsofficial@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // Crear un usuario moderador
        User::create([
            'document' => '7546821',
            'fullname' => 'Pablo Aristizabal',
            'gender' => 'Male',
            'birthdate' => '1990-08-30', // Formato Y-m-d
            'phone' => '45321246',
            'email' => 'moderator@example.com',
            'password' => Hash::make('admin'),
            'role' => 'moderator',
        ]);

        // Crear un usuario regular
        User::create([
            'document' => '9876543',
            'fullname' => 'Maria Garcia',
            'gender' => 'Female',
            'birthdate' => '1985-07-15', // Formato Y-m-d
            'phone' => '3216549870',
            'email' => 'user@example.com',
            'password' => Hash::make('admin'),
            'role' => 'user',
        ]);

        // Crear un usuario invitado
        User::create([
            'document' => '1122334',
            'fullname' => 'Carlos Lopez',
            'gender' => 'Male',
            'birthdate' => '1995-01-23', // Formato Y-m-d
            'phone' => '6543210987',
            'email' => 'guest@example.com',
            'password' => Hash::make('admin'),
            'role' => 'guest',
        ]);

        // Puedes agregar más usuarios si lo necesitas
        // Eliminar la creación de usuarios ficticios si no es necesaria
        // User::factory(50)->create();
    }
}
