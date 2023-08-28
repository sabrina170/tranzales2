<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cliente',
        'id_destino',
        'distancia',
        'galones'
    ];
}
