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
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->unique();
            $table->foreignId('mesa_id')->constrained('mesas')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropForeign(['user_id']); 
            $table->dropForeign(['mesa_id']); 
        });
    }
};
