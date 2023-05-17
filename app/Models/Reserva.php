<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $primaryKey = 'folio';

    protected $casts = [
        'cancelacion' => 'boolean',
    ];

    protected $fillable = [
        'tiempo_tolerancia',
        'cancelacion',
        'inicio_apartado',
        'fin_apartado',
        'fecha',
        'estatus',
    ];
}
