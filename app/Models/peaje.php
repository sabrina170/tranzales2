<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peaje extends Model
{
    use HasFactory;
    protected $fillable = [
        'costo_total',
        'peaje1',
        'precio_peaje1',
        'img_peaje1',
        'peaje2',
        'precio_peaje2',
        'img_peaje2',
        'peaje3',
        'precio_peaje3',
        'img_peaje3',
        'peaje4',
        'precio_peaje4',
        'img_peaje4',
        'origen',
        'fecha_fac',
        'n_fac',
        'observaciones'
    ];
}
