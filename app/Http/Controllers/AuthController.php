<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Venta;

class AuthController extends Controller
{
    //
    public function index()
    {
        // * No entrara al formulario de login si ya esta logueado
        if (Auth::check()) {
            return $this->redirectDashboard(Auth::user());
        }
        return view('login');
    }

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
            return $this->redirectDashboard($user);
        }
        return back()->withErrors(['email' => 'Datos incorrectos.']);

        // Authentication failed, redirect back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function redirectDashboard($user)
    {
        // * Redirección según el rol del usuario
        $role = $user->id_roles;

        switch ($role) {
            case 1:
                return redirect()->route('admin');
            case 2:
                return redirect()->route('cliente');
            case 3:
                return redirect()->route('jefe_cocina');
            case 4:
                return redirect()->route('mesero');
            case 5:
                return redirect()->route('cocina');
            default:
                return redirect('/'); // Redirigir a una página predeterminada si no coincide con ningún rol
        }
    }

    public function pedidos()
    {
        $user = Auth::user();

        // Trae las ventas del usuario autenticado
        $ventas = $user->ventas;
        dd($ventas->detalle_venta);
        // $ventas = Venta::with([
        //     'formaPago', // relación para la forma de pago
        //     'detalles.producto' // relación para los productos en detalles de venta
        //     ])
        //     ->where('user_id', $user->id)
        //     ->orderBy('fecha', 'desc')
        //     ->get();
        //     dd($ventas);
        // Pasa $ventas a la vista
        return view('client.pedidos', compact('ventas'));
    }

    public function registrar(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email',
            'contraseña' => 'required|string|confirmed',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|digits:10',
            'edad' => 'required|integer|min:1|max:120',
            'sexo' => 'required|in:Masculino,Femenino,Otro',
        ], [
            'correo.required' => 'El correo es obligatorio',
            'correo.unique' => 'Este correo ya está registrado',
            'contraseña.confirmed' => 'Las contraseñas no coinciden',
        ]);

        // Crea el usuario
        $user = User::create([
            'name'     => $request->nombre,
            'email'    => $request->correo,
            'password' => Hash::make($request->contraseña),
            'telefono' => $request->telefono,
            'id_roles' => 2,
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form'); // o la ruta que muestra tu login
    }
}
