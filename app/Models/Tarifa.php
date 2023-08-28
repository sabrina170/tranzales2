<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;

    protected $fillable = [

        // Datos Info Personal
        'id_cliente',
        'destinos',
        'cont_destinos',
        'base',
        'igv',
        'total'
    ];
}
