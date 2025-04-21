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
        Schema::table('detalles_comandas', function (Blueprint $table) {
            $table->foreignId('producto_id')->constrained('productos')->unique();
            $table->foreignId('comanda_id')->constrained('comandas')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalles_comandas', function (Blueprint $table) {
            $table->dropForeign(['producto_id']);
            $table->dropForeign(['comanda_id']);
        });
    }
};
