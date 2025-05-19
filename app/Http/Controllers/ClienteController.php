<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // * Envio a la vista del cliente
    public function index()
    {
        // * Obtener los productos
        $productos = Producto::all();

        return view('client.cliente', ['productos' => $productos]);
    }
}
