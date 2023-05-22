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
        Schema::create('ope_orden_trabajo', function (Blueprint $table) {
            $table->id('id_orden')->comment('Identificador de la tabla');
            $table->string('id_acueducto',6)->comment('Identificador de la tabla ope_acueducto');
            $table->string('id_sistema')->comment('Identificador de la tabla ope_sistema');
            $table->string('id_subsistema')->comment('Identificador de la tabla ope_subsistema');
            $table->string('id_equipo', 30)->comment('Identificador de la tabla ope_equipo');
            $table->string('descrip_ot',300)->comment('Descripcion de la orden de trabajo');
            $table->date('fecha')->comment('Fecha de creacion del registro');
            $table->unsignedBigInteger('id_tipo_ot')->comment('Identificador de la tabla ope_tipo_ot');
            $table->unsignedBigInteger('id_prioridad')->comment('Identificador de la tabla ope_prioridad');
            $table->timestamptz('fecha_inicio')->comment('Fecha de inicio');
            $table->timestamptz('fecha_final')->comment('Fecha de final');
            $table->integer('dias')->comment('duracion en dias');
            $table->time('hora')->comment('duracion en horas');
            $table->string('observacion', 255)->comment('Observacion de la orden de trabajo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_orden_trabajo');
    }
};
