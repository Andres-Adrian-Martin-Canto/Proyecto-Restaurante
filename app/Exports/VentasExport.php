<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VentasExport implements FromCollection, WithHeadings
{
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function collection()
    {
        return Venta::with(['user', 'detalles.producto'])
            ->whereBetween('fecha', [$this->start, $this->end])
            ->get()
            ->flatMap(function($venta) {
                return $venta->detalles->map(function($detalle) use ($venta) {
                    return [
                        'ID Venta'      => $venta->id,
                        'Fecha'         => $venta->fecha,
                        'Cliente'       => $venta->user ? $venta->user->name : 'N/A',
                        'Producto'      => $detalle->producto ? $detalle->producto->nombre : 'N/A',
                        'Cantidad'      => $detalle->cantidad_comprada,
                        'Precio Unit.'  => $detalle->producto ? $detalle->producto->precio : 'N/A',
                        'Método Pago'   => $venta->metodo_pago,
                    ];
                });
            });
    }

    public function headings(): array
    {
        return [
            'ID Venta',
            'Fecha',
            'Cliente',
            'Producto',
            'Cantidad',
            'Precio Unit.',
            'Método Pago',
        ];
    }
}
