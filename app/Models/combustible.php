<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class combustible extends Model
{
    use HasFactory;
    protected $fillable = [
        'costo_total',
        'recarga1',
        'img_recarga1',
        'recarga2',
        'img_recarga2',
        'precio_1re',
        'precio_2re',
        'cant_1re',
        'cant_2re',
        'origen',
        'fecha_fac',
        'n_fac',
        'observaciones'
    ];
}
