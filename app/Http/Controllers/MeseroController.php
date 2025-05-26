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

    public function verComandasMesero()
    {
        // * Obtiene todos los detalles de las comandas
        $detallesComanda = DetalleComanda::orderBy('comanda_id')->get();
        // * Arreglo para almacenar la información de las comandas
        $arregloInformacion = [];
        foreach ($detallesComanda as $detalle) {
            // Solo procesa comandas con estado_pedido_id igual a 1
            if ($detalle->comanda->estado_pedido_id === 4) {
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

                // Obtiene la descripción del estado de la comanda
                $statusDescripcion = $detalle->comanda->estadoPedido->descripcion;

                $arregloInformacion[$detalle->comanda_id] = [
                    'id' => $detalle->comanda_id,
                    'nombreMesa' => $mesaNombre,
                    'cantidad_producto' => $detalle->cantidad_producto,
                    'productos' => [],
                    'total' => 0, // Inicializa el total de la comanda
                    'status' => $statusDescripcion,
                ];
            }
            $producto_total = $detalle->producto->precio * $detalle->cantidad_producto;
            $arregloInformacion[$detalle->comanda_id]['productos'][] = [
                'id' => $detalle->id,
                'cantidad_producto' => $detalle->cantidad_producto,
                'producto_nombre' => $detalle->producto->nombre,
                'producto_total' => $producto_total,
            ];
            // Suma el total de los productos a la comanda correspondiente
            $arregloInformacion[$detalle->comanda_id]['total'] += $producto_total;
        }
        // Envio los datos a la vista
        return view('mesero.comandas', ['arregloInformacion' => $arregloInformacion]);
    }

    // * Cambia el estado de la comanda a 4 (completada)
    public function cambiarEstadoComanda(Request $request)
    {
        // * Cambia el estado de la comanda a 4 (completada)
        $comanda_id = $request->input('comanda_id');
        $comanda = Comanda::find($comanda_id);
        $comanda->estado_pedido_id = 4;
        $comanda->save();
        return redirect()->back();
    }
}
