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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_solicitud', 120);
            $table->date('fecha_solicitud');
            $table->string('cliente', 150);
            $table->date('fecha_traslado');
            $table->string('origen', 150);
            $table->time('hora');
            $table->integer('cantidad');
            $table->text('destinos');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
