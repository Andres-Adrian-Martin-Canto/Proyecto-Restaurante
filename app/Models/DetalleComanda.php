<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleComanda  extends Model
{
    use HasFactory;
    protected $table = 'detalles_comandas';
    protected $fillable = [
        'cantidad_producto',
        'producto_id',
        'comanda_id'
    ];

    // Relación con la tabla productos
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    // Relación con la tabla comanda
    public function comanda()
    {
        return $this->belongsTo(Comanda::class, 'comanda_id');
    }
}

