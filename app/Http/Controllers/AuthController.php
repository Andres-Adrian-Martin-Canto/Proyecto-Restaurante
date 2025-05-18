<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        Log::info("message");
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        // Check if the user exists and the password is correct
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // * Authenticate the user
            Auth::login($user);

            // 🔁 Redirección según el rol del usuario
            $role = $user->id_roles;

            // * ADMINISTADOR
            if ($role === 1) {
                return redirect()->route('admin');
                // * COCINA
            } else if ($role === 2) {
                // ! return view('jefe-cocina.jefeCocina');
                // * USUARIO
            } else if ($role === 3) {
                // ! return view('mesero.mesero'); // Default
            } else {
                // ! return view('client.cliente');
            }
        }
        return back()->withErrors(['email' => 'Credenciales incorrectas.']);

        // Authentication failed, redirect back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registrar(Request $request)
    {

        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email',
            'contraseña' => 'required|string|min:8|confirmed',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|digits:10',
            'edad' => 'required|integer|min:1|max:120',
            'sexo' => 'required|in:Masculino,Femenino,Otro',
        ], [
            'correo.required' => 'el correo es obligatorio',
            'correo.unique' => 'este correo ya esta registrado',
        ]);


        // Crea el usuario
        $user = User::create([
            'name'     => $request->nombre,
            'email'    => $request->correo,
            'password' => Hash::make($request->contraseña),
            'telefono' => $request->telefono,
            'id_roles' => 1,
        ]);

        // Crea el cliente
        Cliente::create([
            'user_id'   => $user->id,
            'direccion' => $request->direccion,
            'edad'      => $request->edad,
            'sexo'      => $request->sexo,
        ]);

        // Redirecciona con mensaje
        return redirect()->route('login.form')->with('success', 'Usuario registrado correctamente. Ahora inicia sesión.');
    }
}
