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
        Schema::create('turno_mesero', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('turno');
            $table->time('hora_entrada');
            $table->time('hora_salida');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turno_mesero');
    }
};
