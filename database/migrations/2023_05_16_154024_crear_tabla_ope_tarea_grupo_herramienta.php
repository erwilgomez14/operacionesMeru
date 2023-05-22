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
        Schema::create('ope_tarea_grupo_herramienta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tarea')->comment('Identificador de la tabla tareas_equipos');
            $table->unsignedBigInteger('id_grupo_herramienta')->comment('Identificador de la tabla op_grupo_herramienta');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_tarea_grupo_herramienta');
    }
};
