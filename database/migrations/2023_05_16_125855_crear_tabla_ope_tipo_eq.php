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
        Schema::create('ope_tipo_eq', function (Blueprint $table) {
            $table->string('id_tipo_eq', 4)->primary()->nullable()->comment('Clave primaria de la tabla');
            $table->string('nombre_tipeq',6)->nullable(true)->comment('Referencia del Tipo de Equipo');
            $table->string('descripcion_tieq',150)->nullable(true)->comment('Descripcion del Tipo de equipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_tipo_eq');
    }
};
