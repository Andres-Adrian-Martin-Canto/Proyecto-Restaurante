<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno_Mesero extends Model
{
    use HasFactory;
    protected $table = 'turno_mesero';
    protected $fillable = [
        'user_id',
        'turno',
        'hora_entrada',
        'hora_salida',
    ];
}
