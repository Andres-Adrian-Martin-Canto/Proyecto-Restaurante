<?php

namespace App\Http\Controllers;

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
            }else {
                // ! return view('client.cliente');
            }
        }
        return back()->withErrors(['email' => 'Credenciales incorrectas.']);

        // Authentication failed, redirect back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
