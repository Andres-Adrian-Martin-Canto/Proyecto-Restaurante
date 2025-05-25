<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Venta;

class ClienteControllerPedidos extends Controller
{
    // Vista principal del cliente (puedes ajustar según tus vistas)

    // Pedidos del cliente
    public function pedidos()
    {
        $user = Auth::user();
        $ventas = $user->ventas()->with(['detalles.producto'])->orderBy('fecha', 'desc')->get();
        return view('client.pedidos', compact('ventas'));
    }

}
