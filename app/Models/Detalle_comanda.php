<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_comanda extends Model
{
    use HasFactory;
    protected $table = 'detalles_comandas';
    protected $fillable = [
        'cantidad_producto',
        'producto_id',
        'comanda_id'
    ];
}
