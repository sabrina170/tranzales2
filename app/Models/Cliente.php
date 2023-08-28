<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ruc',
        'referencia',
        'departamento',
        'provincia',
        'distrito',
        'direccion',
        'estado',
        'contactos',
        'tipo_servicio'
    ];
}
