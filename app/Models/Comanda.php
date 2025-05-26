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

    // Relación con la tabla detalles_comandas
    public function detallesComanda()
    {
        return $this->hasMany(DetalleComanda::class, 'comanda_id');
    }
    // Relación con la tabla usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relacion de estado_pedido
    public function estadoPedido()
    {
        return $this->belongsTo(Estado_pedido::class, 'estado_pedido_id');
    }
}
