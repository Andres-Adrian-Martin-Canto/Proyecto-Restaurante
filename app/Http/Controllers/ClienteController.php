<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Comanda;
use App\Models\DetalleComanda;
use App\Models\Mesa;
use App\Models\Reservacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    // * Envio a la vista del cliente
    public function index()
    {
        // * Obtener los productos
        $productos = Producto::all();

        return view('client.cliente', ['productos' => $productos]);
    }

    // * Guarda la comanda en la base de datos
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
        $comanda = Comanda::create([
            'fecha' => now(),
            'mesa_id' => 22,
            'user_id' => $user->id,
            'estado_pedido_id' => 1,
        ]);

        // Inserta los detalles
        foreach ($request->productos as $producto) {
            DetalleComanda::create([
                'cantidad_producto' => $producto['cantidad'],
                'producto_id' => $producto['id'],
                'comanda_id' => $comanda->id
            ]);
        }

        return response()->json(['success' => true]);
    }


    public function getReservaciones(Request $request)
    {
        // !!!!!!!!! FALTA TERMINARLO
        // Accede a los datos enviados por el formulario
        $datos = $request->all();

        // Ejemplo de cómo obtener campos individuales:
        $fecha = $request->input('date');
        $horaInicio = $request->input('start_time');
        $mesa_id = $request->input('chart');

        // Combina la fecha y la hora:
        $fechaHora = $fecha . ' ' . $horaInicio . ':00';

        // Busca si existe alguna reservación con EXACTAMENTE esa fecha y hora para esa mesa
        // Calcula la hora de fin sumando 2 horas a la hora de inicio
        $fechaHoraFin = date('Y-m-d H:i:s', strtotime($fechaHora . ' +2 hours'));

        // Busca si existe alguna reservación para esa mesa donde el rango de horas se traslapa
        $reservacionOcupada = DB::table('reservaciones')
            ->where('mesa_id', $mesa_id)
            ->where(function ($query) use ($fechaHora, $fechaHoraFin) {
                $query->whereBetween('fecha_reservacion', [$fechaHora, $fechaHoraFin])
                    ->orWhere(function ($q) use ($fechaHora, $fechaHoraFin) {
                        $q->where('fecha_reservacion', '<', $fechaHora)
                            ->whereRaw("DATE_ADD(fecha_reservacion, INTERVAL 2 HOUR) > ?", [$fechaHora]);
                    });
            })
            ->exists();

        if ($reservacionOcupada) {
            Log::info("La mesa esta ocupada en el rango de horas solicitado.");
        }




        // Retorna la vista con los datos
        // return view('client.reservaciones', ['datos' => $datos]);

    }

    public function guardarReservacion(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'date' => 'required|date',
            'chart' => 'required|numeric',
            'start_time' => 'required'
        ]);

        // Combina fecha y hora para la reservación
        $fechaHora = $request->input('date') . ' ' . $request->input('start_time') . ':00';

        // Intenta crear la reservación
        $reservacion = \App\Models\Reservacion::create([
            'fecha_reservacion' => $fechaHora,
            'user_id' => auth()->id(),
            'mesa_id' => $request->input('chart')
        ]);

        if ($reservacion) {
            // ✅ Exito
            return response()->json(['success' => true]);
        } else {
            // ❌ Error al guardar
            return response()->json(['success' => false, 'message' => 'No se pudo guardar la reservación.']);
        }
    }
}
