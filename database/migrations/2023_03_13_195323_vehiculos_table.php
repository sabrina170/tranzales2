<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('unidad');
            $table->string('marca', 30);
            $table->string('placa', 30);
            $table->string('tar_circulacion', 15);
            $table->string('n_certificado', 50);
            $table->date('fecha_ven_citv');
            $table->string('soat', 50);
            $table->date('fecha_ven_soat');
            $table->string('categoria', 10);
            $table->string('seria_chasis', 70);
            $table->integer('anois_fab');
            $table->integer('n_ejes');
            $table->integer('carga_util');
            $table->integer('peso_seco');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
