<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;
    protected $table = 'comandas';
    protected $fillable = [
        'fecha',
        'mesa_id',
        'user_id',
        'estado_pedido_id'
    ];
}
