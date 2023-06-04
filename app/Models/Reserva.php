<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['equipo_id', 'username', 'fecha', 'hora_inicio', 'hora_fin'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    // Agrega si tienes una tabla de usuarios:
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
