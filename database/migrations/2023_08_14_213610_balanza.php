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
        Schema::create('balanzas', function (Blueprint $table) {
            $table->id();
            $table->double('costo_total', 3);
            $table->double('precio_ba', 3);
            $table->integer('recarga2');
            $table->string('origen');
            $table->date('fecha_fac');
            $table->string('n_fac');
            $table->string('img_fac');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balanzas');
    }
};
