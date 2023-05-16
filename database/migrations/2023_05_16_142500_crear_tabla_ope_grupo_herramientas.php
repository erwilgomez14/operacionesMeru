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
        Schema::create('ope_grupo_herramientas', function (Blueprint $table) {
            $table->id('id_grupo_herramienta')->comment('Clave primaria');
            $table->string('nombre_grupo', 255)->comment('Nombre del grupo herramienta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_grupo_herramientas');
    }
};
