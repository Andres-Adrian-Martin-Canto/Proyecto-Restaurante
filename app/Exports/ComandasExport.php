<?php

namespace App\Exports;

use App\Models\Comanda;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComandasExport implements FromCollection, WithHeadings
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
        return Comanda::with(['usuario', 'detallesComanda.producto', 'estadoPedido'])
            ->whereBetween('fecha', [$this->start, $this->end])
            ->get()
            ->flatMap(function($comanda) {
                return $comanda->detallesComanda->map(function($detalle) use ($comanda) {
                    return [
                        'ID Comanda'    => $comanda->id,
                        'Fecha'         => $comanda->fecha,
                        'Mesero'        => $comanda->usuario ? $comanda->usuario->name : 'N/A',
                        'Producto'      => $detalle->producto ? $detalle->producto->nombre : 'N/A',
                        'Cantidad'      => $detalle->cantidad_producto,
                        'Estado'        => $comanda->estadoPedido ? $comanda->estadoPedido->descripcion : 'N/A',
                    ];
                });
            });
    }

    public function headings(): array
    {
        return [
            'ID Comanda',
            'Fecha',
            'Mesero',
            'Producto',
            'Cantidad',
            'Estado',
        ];
    }
}
