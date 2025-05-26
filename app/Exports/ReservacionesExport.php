<?php

namespace App\Exports;

use App\Models\Reservacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservacionesExport implements FromCollection, WithHeadings
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
        return Reservacion::with(['user', 'mesa'])
            ->whereBetween('fecha_reservacion', [$this->start, $this->end])
            ->get()
            ->map(function($reserva) {
                return [
                    'ID Reservación'    => $reserva->id,
                    'Fecha'             => $reserva->fecha_reservacion,
                    'Cliente'           => $reserva->user ? $reserva->user->name : 'N/A',
                    'Mesa'              => $reserva->mesa ? $reserva->mesa->num_mesa : 'N/A',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID Reservación',
            'Fecha',
            'Cliente',
            'Mesa',
        ];
    }
}
