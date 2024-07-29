<?php

//gameapp/app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Muestra una lista de todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    // Muestra el formulario para crear un nuevo usuario
    public function create()
    {
        return view('users.create');
    }

    // Almacena un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'password' => 'required|string|confirmed|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
            'photo' => $request->photo ? $request->file('photo')->store('photos') : null,
        ]);

        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }

    // Muestra el formulario para editar un usuario existente
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Actualiza un usuario existente en la base de datos
    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'password' => 'nullable|string|confirmed|min:8',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')->store('photos');
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Muestra los detalles de un usuario específico
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Cierra sesión del usuario
    public function logout(Request $request)
    {
        auth()->logout();

        return redirect('/');
    }
}
