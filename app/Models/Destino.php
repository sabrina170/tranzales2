<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente',
        'empresa',
        'referencia',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'estado'
    ];
}
