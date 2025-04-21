<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_venta extends Model
{
    use HasFactory;
    protected $table = 'detalles_ventas';
    protected $fillable = [
        'cantidad_comprada',
        'venta_id',
        'producto_id'
    ];
}
