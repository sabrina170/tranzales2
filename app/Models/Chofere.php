<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofere extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres_cho',
        'apellidos_cho',
        'tipo_contrato',
        'dni_cho',
        'estado_cho',
        'brevete_cho',
        'fecha_ven_cho',
        'celular_cho',
        'tipo_cho',
        'telefono_emer',
        'duracion_contrato',
        'fecha_inicio',
        'url_dni',
        'url_contrato'
    ];
}
