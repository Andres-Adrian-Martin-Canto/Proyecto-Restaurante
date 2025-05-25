<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\DetalleComanda;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MeseroController extends Controller
{
    //
    public function index()
    {
        // * Obtener los productos
        $productos = Producto::all();

        return view('mesero.mesero', ['productos' => $productos]);
    }

    public function registrarPedido(Request $request)
    {
        // Obtener todos los datos de la petición
        $datos = $request->all();

        // Obtener el valor de mesa
        $mesa = $datos['mesa'];
        $productos = $datos['productos']; // Mantener como array para el foreach

        // Crea la comanda
        $comanda = Comanda::create([
            'fecha' => now(),
            'mesa_id' => $mesa,
            'user_id' => Auth::id(),
            'estado_pedido_id' => 1,
        ]);
        // Inserta los detalles
        foreach ($productos as $producto) {
            DetalleComanda::create([
                'cantidad_producto' => $producto['cantidad'],
                'producto_id' => $producto['id'],
                'comanda_id' => $comanda->id
            ]);
        }
        return response()->json(['success' => true]);
    }



}
