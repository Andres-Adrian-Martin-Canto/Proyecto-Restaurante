<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Comanda;
use App\Models\DetalleComanda;


class ClienteController extends Controller
{
    // * Envio a la vista del cliente
    public function index()
    {
        // * Obtener los productos
        $productos = Producto::all();

        return view('client.cliente', ['productos' => $productos]);
    }
    public function guardarComanda(Request $request)
    {
        // Validación simple
        $request->validate([
            'productos' => 'required|array|min:1'
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'No autenticado'], 401);
        }

        // Crea la comanda
        $comanda = \App\Models\Comanda::create([
            'fecha' => now(),
            'mesa_id' => 22, 
            'user_id' => $user->id,
            'estado_pedido_id' => 1, 
        ]);

        // Inserta los detalles
        foreach ($request->productos as $producto) {
            \App\Models\DetalleComanda::create([
                'cantidad_producto' => $producto['cantidad'],
                'producto_id' => $producto['id'],
                'comanda_id' => $comanda->id
            ]);
        }

        return response()->json(['success' => true]);
    }
}
