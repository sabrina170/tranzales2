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
        Schema::create('peajes', function (Blueprint $table) {
            $table->id();
            $table->double('costo_total', 3);
            $table->integer('peaje1');
            $table->double('precio_peaje1', 3);
            $table->string('img_peaje1');
            $table->integer('peaje2');
            $table->double('precio_peaje2', 3);
            $table->string('img_peaje2');
            $table->integer('peaje3');
            $table->double('precio_peaje3', 3);
            $table->string('img_peaje3');
            $table->integer('peaje4');
            $table->double('precio_peaje4', 3);
            $table->string('img_peaje4');
            $table->string('origen');
            $table->date('fecha_fac');
            $table->string('n_fac');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peajes');
    }
};
