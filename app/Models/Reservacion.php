<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;
    protected $table = 'reservaciones';
    protected $fillable = [
        'fecha_reservacion',
        'user_id',
        'mesa_id'
    ];
}
