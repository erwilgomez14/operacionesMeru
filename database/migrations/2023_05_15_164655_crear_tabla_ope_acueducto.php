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
        Schema::create('ope_acueducto', function (Blueprint $table) {
            $table->string('id_acueducto', 4)->primary()->nullable()->comment('Identificador del acueducto');
            $table->string('nom_acu', 80)->nullable(true)->comment('Nombre del acueducto');
            $table->string('desc_acu', 150)->nullable(true)->comment('Descripcion del Acueducto');
            $table->string('fuente_abast', 80)->nullable(true)->comment('Fuente de Abastecimiento del Acueducto');
            $table->integer('capacidad_almac')->nullable(true)->comment('Capacidad de Produccion del acueducto');
            $table->integer('tiempo_oper')->nullable(true)->comment('Tiempo de Operacion Diario de la planta');
            $table->string('energia_util', 20)->nullable(true)->comment('Tipo de Energia Utilizada');
            $table->string('modelo_planta', 20)->nullable(true)->comment('Modelo de la Planta');
            $table->string('id_gerencia', 3)->nullable(true)->comment('Identificador de la tabla ope_gerencia');
            $table->string('cod_ubi', 3)->nullable(true)->comment('Identificador de la tabla pardefubi');           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_acueducto');
    }
};
