<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VentasExport;
use App\Exports\ReservacionesExport;
use App\Exports\ComandasExport;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function exportar(Request $request)
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'concept' => 'required|string',
        ]);

        // Formatea correctamente la fecha
        $start = \Carbon\Carbon::parse($request->input('start'))->format('Y-m-d H:i:s');
        $end = \Carbon\Carbon::parse($request->input('end'))->format('Y-m-d H:i:s');
        $concept = $request->input('concept');

        switch ($concept) {
            case 'Ventas':
                $export = new VentasExport($start, $end);
                $filename = 'reporte_ventas.xlsx';
                break;
            case 'Reservaciones':
                $export = new ReservacionesExport($start, $end);
                $filename = 'reporte_reservaciones.xlsx';
                break;
            case 'Comandas_y_pedidos':
                $export = new ComandasExport($start, $end);
                $filename = 'reporte_comandas.xlsx';
                break;
            default:
                abort(404, 'Concepto inválido');
        }

        return Excel::download($export, $filename);
    }
}
