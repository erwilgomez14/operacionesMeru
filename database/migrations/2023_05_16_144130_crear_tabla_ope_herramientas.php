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
        Schema::create('ope_herramientas', function (Blueprint $table) {
            $table->id('id_herramienta')->comment('Identificador de la tabla');
            $table->string('nombre_herramienta')->comment('Nombre de la herramienta');
            $table->unsignedBigInteger('id_grupo_herramienta')->comment('Identificador de la tabla op_grupo_herramienta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_herramientas');
    }
};
