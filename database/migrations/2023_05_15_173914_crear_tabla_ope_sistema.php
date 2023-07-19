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
        Schema::create('ope_sistema', function (Blueprint $table) {
            $table->string('id_sistema', 11)->primary()->nullable()->comment('Clave primaria de la tabla');
            $table->string('id_acueducto', 4)->nullable(true)->comment('Identificador de la tabla ope_acueducto');
            $table->string('nom_sistema', 80)->nullable(true)->comment('Nombre del Sistema');
            $table->string('desc_sistema', 100)->nullable(true)->comment('Descripcion del Sistema');
            $table->integer('posiciones')->nullable(true)->comment('Cantidad de posiciones instaladas o necesarias para operar');
            $table->integer('posicion_necesaria')->nullable(true)->comment('Posisciones Necesarias para mantener el sistema 100% operativo');
            $table->string('id_area', 4)->nullable(true)->comment('Identificador de la tabla ope_area');
            $table->string('ubicacion', 200)->nullable(true)->comment('Ubicacion del sistema');
            $table->integer('capacidad_sistema')->nullable(true)->comment('Capacidad medida en Litros por segundo');
            $table->string('georeferencia', 125)->nullable(true)->comment('Longitud y Latitud de Georeferencia del Sistema');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_sistema');
    }
};
