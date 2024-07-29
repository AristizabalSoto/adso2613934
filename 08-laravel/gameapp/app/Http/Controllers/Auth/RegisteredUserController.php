<?php

// Ubicación del archivo: gameapp/app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'password' => 'required|string|confirmed|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
            'photo' => $request->photo ? $request->file('photo')->store('photos') : null,
            // Elimina 'document' de aquí
        ]);

        // Más lógica aquí, como redirigir al usuario o iniciar sesión
        return redirect()->route('login')->with('success', 'Registration successful.');
    }
}
