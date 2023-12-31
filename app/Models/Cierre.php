<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cierre extends Model
{
    use HasFactory;
    protected $fillable = [
        'datos_guias',
        'n_guias',
        'datos_remision',
        'n_remision',
        'indicaciones',
        'fecha_fac',
        'n_fac',
        'km_inicial',
        'km_final'
    ];
}
