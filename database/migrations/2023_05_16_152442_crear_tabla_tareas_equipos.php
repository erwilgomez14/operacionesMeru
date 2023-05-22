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
        Schema::create('tareas_equipos', function (Blueprint $table) {
            $table->id('id_tareas')->comment('Identificador de la tabla');
            $table->string('tarea',400)->comment('Actividad de la tarea');
            $table->string('id_tipo_eq',4)->comment('Identificador de la tabla ope_tipo_eq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas_equipos');
    }
};
