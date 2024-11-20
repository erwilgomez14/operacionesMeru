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
        Schema::create('ope_suministros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_suministro', 30);
            $table->string('detalle_suministro', 150);
            //$table->string('id_tarea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_suministros');
    }
};
