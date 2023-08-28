<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [

        'unidad',
        'marca',
        'placa',
        'tar_circulacion',
        'n_certificado',
        'fecha_ven_citv',
        'soat',
        'fecha_ven_soat',
        'categoria',
        'seria_chasis',
        'anois_fab',
        'n_ejes',
        'carga_util',
        'peso_seco',
        'estado',
        'imagen'
    ];
}
