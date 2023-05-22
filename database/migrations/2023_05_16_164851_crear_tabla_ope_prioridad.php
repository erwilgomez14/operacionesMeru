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
        Schema::create('ope_prioridad', function (Blueprint $table) {
            $table->id('id_prioridad')->comment('Identificador de la tabla');
            $table->string('desc_priori', 20)->comment('Descripcion de la prioridad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_prioridad');
    }
};
