<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\DetalleComanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class jefe_cocinaController extends Controller
{
    public function index()
    {
        // * Obtiene todos los detalles de las comandas
        $detallesComanda = DetalleComanda::orderBy('comanda_id')->get();
        // * Arreglo para almacenar la información de las comandas
        $arregloInformacion = [];
        foreach ($detallesComanda as $detalle) {
            // Solo procesa comandas con estado_pedido_id igual a 1
            if ($detalle->comanda->estado_pedido_id !== 1) {
                continue;
            }
            // Agrupa los detalles por comanda_id
            if (!isset($arregloInformacion[$detalle->comanda_id])) {
                // Obtiene la mesa asociada a la comanda
                $mesaNumero = $detalle->comanda->mesa_id;
                // Verifica si la mesa es la 22, que es especial
                // Si es la mesa 22, muestra el nombre del usuario y su ID
                $mesaNombre = ($mesaNumero == 22)
                    ? $detalle->comanda->usuario->name . ' (ID: ' . $detalle->comanda->usuario->id . ')'
                    : 'Mesa ' . $mesaNumero;

                $arregloInformacion[$detalle->comanda_id] = [
                    'id' => $detalle->comanda_id,
                    'nombreMesa' => $mesaNombre,
                    'productos' => [],
                ];
            }
            $arregloInformacion[$detalle->comanda_id]['productos'][] = [
                'id' => $detalle->id,
                'cantidad_producto' => $detalle->cantidad_producto,
                'producto_nombre' => $detalle->producto->nombre,
            ];
        }
        // * Retornar la vista del jefe de cocina
        return view('jefe-cocina.jefeCocina', ['arregloInformacion' => $arregloInformacion]);
    }

    public function actualizarEstadoComanda(Request $request)
    {
        $comanda = Comanda::find($request->comanda_id);
        $estadoPedidoId = $request->input('estado'); // Cambiado a 'estado' para coincidir con el JSON enviado
        if ($comanda && $estadoPedidoId) {
            if ($estadoPedidoId === 'listo') {
                $comanda->estado_pedido_id = 2;
            } elseif ($estadoPedidoId === 'cancelado') {
                $comanda->estado_pedido_id = 3;
            }
            // Si no es 'listo' ni 'cancelado', no cambia el estado
            $comanda->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Comanda no encontrada o estado no proporcionado']);
    }
}
