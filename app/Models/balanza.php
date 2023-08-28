<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balanza extends Model
{
    use HasFactory;
    protected $fillable = [
        'costo_total',
        'precio_ba',
        'origen',
        'fecha_fac',
        'n_fac',
        'img_fac',
        'observaciones'
    ];
}
