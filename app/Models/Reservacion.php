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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'mesa_id');
    }
}
