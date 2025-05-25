<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\DetalleComanda;
use Illuminate\Http\Request;

class jefe_cocinaController extends Controller
{
    //

    public function index()
    {
        // !!! NO ESTA TERMINADO
        // Obtener detalles de comanda con el modelo Comanda
        $comandas = DetalleComanda::all(); // Aquí deberías usar tu modelo Comanda para obtener los datos

        // * Retornar la vista del jefe de cocina
        return view('jefe-cocina.jefeCocina');
    }
}
