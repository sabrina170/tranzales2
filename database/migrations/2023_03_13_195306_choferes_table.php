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
        Schema::create('choferes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres_cho');
            $table->string('apellido_ma_cho', 30);
            $table->string('apellido_pa_cho', 30);
            $table->integer('tipo_dni_cho');
            $table->integer('dni_cho');
            $table->integer('estado_cho');
            $table->string('brevete_cho', 50);
            $table->date('fecha_ven_cho');
            $table->integer('celular_cho');
            $table->integer('tipo_cho');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choferes');
    }
};
