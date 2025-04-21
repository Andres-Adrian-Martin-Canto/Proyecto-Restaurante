<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_pedido extends Model
{
    use HasFactory;
    protected $table = 'estados_pedidos';
    protected $fillable = [
        'descripcion'
    ];
}
