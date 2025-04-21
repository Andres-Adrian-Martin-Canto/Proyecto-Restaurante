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
        Schema::table('comandas', function (Blueprint $table) {
            $table->foreignId('mesa_id')->constrained('mesas')->unique();
            $table->foreignId('user_id')->constrained('users')->unique();
            $table->foreignId('estado_pedido_id')->constrained('estados_pedidos')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comandas', function (Blueprint $table) {
            $table->dropForeign(['mesa_id']); 
            $table->dropForeign(['user_id']); 
            $table->dropForeign(['estado_pedido_id']); 
        });
    }
};
