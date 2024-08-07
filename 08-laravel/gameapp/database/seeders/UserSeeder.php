<?php

// ubicacion: gameapp/database/seeders/UserSeeder.php

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
        // Insertar datos específicos

        $user = new User();
        $user->document = '1053810807';
        $user->fullname = 'Jonathan Aristizabal';
        $user->gender = 'Male';
        $user->birthdate = '1990-12-30';
        $user->phone = '3187542709';
        $user->email = 'martinrobinsofficial@gmail.com';
        $user->password = Hash::make('admin');
        $user->role = 'administrador';
        $user->save();

        // Usar el facade DB para insertar un tercer usuario específico
        DB::table('users')->insert([
            'document' => '7546821',
            'fullname' => 'Pablo Aristizabal',
            'gender' => 'Male',
            'birthdate' => '1990-08-30',
            'phone' => '45321246',
            'email' => 'martin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'customer',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Usar el factory para crear 50 usuarios ficticios
        User::factory(20)->create();
    }
}
