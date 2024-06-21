<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
});

// ----------------------------------------------------------------------------------------------------------------

Route::get('/games/list', function () {
    $games = App\Models\Game::all();
    dd($games); 
});

// -------------------------------------------------------------------------------------------------------------

Route::get('/consulta/{id}', function ($id) {
    $user = User::findOrFail($id);
    $fullName = $user->fullname;
    $ageInYears = Carbon::parse($user->birthdate)->age;
    $createdAt = $user->created_at->diffForHumans();

    return "User: $fullName | Age: $ageInYears years | Created: $createdAt";
});

// ---------------------------------------------------------------------------------------------------------

Route::get('/consulta', function () {
    $users = User::take(20)->get();

    $output = [];

    foreach ($users as $user) {
        $fullName = $user->fullname;
        $ageInYears = Carbon::parse($user->birthdate)->age;
        $createdAt = $user->created_at->diffForHumans();

        $output[] = "User: $fullName | Age: $ageInYears years | Created: $createdAt";
    }

    return implode('<br>', $output);
});

// --------------------------------------------------------------------------------------------------------------

Route::get('/games', function () {
    $games = App\Models\Game::all();
    return view('listgames')->with('games', $games);
});


