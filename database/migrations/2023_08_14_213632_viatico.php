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
        Schema::create('viaticos', function (Blueprint $table) {
            $table->id();
            $table->double('costo_total', 3);
            $table->double('movilidad', 3);
            $table->string('motivo_mo');
            $table->double('alimento', 3);
            $table->string('motivo_ali');
            $table->double('servicio', 3);
            $table->string('motivo_ser');
            $table->string('origen');
            $table->date('fecha_fac');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viaticos');
    }
};
