<?php

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
        // Using ORM Eloquent
        $user = new User();
        $user->document = '1245678';
        $user->fullname = 'Robin';
        $user->gender = 'Male';
        $user->birthdate = '1990-12-28';
        $user->phone = '3187542708';
        $user->email = 'robin@gmail.com';
        $user->password = Hash::make('admin');
        $user->role = 'administrador';
        $user->save();

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

        // Using DB facade
        DB::table('users')->insert([
            'document' => '7546821',
            'fullname' => 'pablo Aristizabal',
            'gender' => 'Male',
            'birthdate' => '1990-08-30',
            'phone' => '45321246',
            'email' => 'martin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'customer',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}


