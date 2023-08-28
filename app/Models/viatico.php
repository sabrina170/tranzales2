<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viatico extends Model
{
    use HasFactory;
    protected $fillable = [
        'costo_total',
        'movilidad',
        'motivo_mo',
        'alimento',
        'motivo_ali',
        'servicio',
        'motivo_ser',
        'origen',
        'observaciones'
    ];
}
