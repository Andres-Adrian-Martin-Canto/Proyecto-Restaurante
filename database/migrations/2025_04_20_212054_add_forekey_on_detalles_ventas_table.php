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
        Schema::table('detalles_ventas', function (Blueprint $table) {
            $table->foreignId('venta_id')->constrained('ventas')->unique();
            $table->foreignId('producto_id')->constrained('productos')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalles_ventas', function (Blueprint $table) {
            $table->dropForeign(['venta_id']); 
            $table->dropForeign(['producto_id']); 
        });
    }
};
