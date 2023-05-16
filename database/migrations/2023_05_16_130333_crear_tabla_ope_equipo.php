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
        Schema::create('ope_equipo', function (Blueprint $table) {
            $table->string('id_equipo', 23)->primary()->nullable()->comment('Identificador del Equipo');
            //$table->string('id_sistema', 11)->nullable(true)->comment('Identificador del Equipo');
            $table->string('id_subsistema', 15)->nullable()->comment('Identificador del Subsistema');
            $table->string('serial', 60)->nullable(true)->comment('serial del equipo');
            $table->string('desc_equipo', 200)->nullable(true)->comment('Descripcion del Equipo');
            $table->string('potencia', 10)->nullable(true)->comment('Potencia del Equipo');
            $table->string('velocidad', 10)->nullable(true)->comment('Velocidad del Equipo');
            $table->string('voltaje', 25)->nullable(true)->comment('Voltaje del Equipo');
            $table->string('frame', 8)->nullable(true)->comment('frame del Equipo');
            $table->string('fs', 10)->nullable(true)->comment('Factor de servicio del Equipo');
            $table->string('peso', 10)->nullable(true)->comment('Peso del Equipo');
            $table->string('temperatura', 4)->nullable(true)->comment('Temperatura del Equipo');
            $table->integer('nvecrep')->nullable(true)->comment('Numero de veces que se ha del Equipo');
            $table->string('permant', 4)->nullable(true)->comment('Tiempo en que se le debe realizar Mantenimientos Preventivos');
            $table->string('rpm', 10)->nullable(true)->comment('Revoluciones por Minuto');
            $table->string('id_tipo_eq', 4)->nullable(true)->comment('Identificador de la tabla tipo de equipo');
            $table->string('id_status', 1)->nullable()->default('O')->comment('frame del Equipo');
            $table->string('frabricante', 150)->nullable(true)->comment('Fabricante del Equipo');
            $table->string('amperios', 8)->nullable(true)->comment('amperios del Equipo');
            $table->string('ciclos', 5)->nullable(true)->comment('ciclos del Equipo');
            $table->string('ph', 5)->nullable(true)->comment('frame del Equipo');
            $table->string('capacidad_ac_sup', 10)->nullable(true)->comment('Capacidad de Aceite Superior');
            $table->string('capacidad_ac_inf', 10)->nullable(true)->comment('Capacidad de Aceite Inferior');
            $table->date('fecha_adquisicion')->nullable()->comment('Fecha de Adquisicion del Equipo');
            $table->date('fecha_instalacion')->nullable()->comment('Fecha de instalacion del Equipo');
            $table->string('caudal', 6)->nullable(true)->comment('');
            $table->string('altura', 6)->nullable(true)->comment('');
            $table->string('descarga', 10)->nullable(true)->comment('');
            $table->string('longitud_columna', 10)->nullable(true)->comment('');
            $table->string('succion', 6)->nullable(true)->comment('');
            $table->integer('num_etapas')->nullable(true)->comment('');
            $table->string('capacidad', 20)->nullable(true)->comment('');
            $table->string('fracuencia', 50)->nullable(true)->comment('');
            $table->string('corriente', 100)->nullable(true)->comment('');
            $table->string('impedancia', 100)->nullable(true)->comment('');
            $table->string('tipo_filtro', 20)->nullable(true)->comment('');
            $table->string('rata_filtracion', 10)->nullable(true)->comment('');
            $table->string('capacidad_filtracion', 20)->nullable(true)->comment('');
            $table->string('rendimiento', 20)->nullable(true)->comment('');
            $table->string('perdida_carga', 10)->nullable(true)->comment('');
            $table->string('area', 10)->nullable(true)->comment('');
            $table->string('largo', 10)->nullable(true)->comment('');
            $table->string('ancho', 10)->nullable(true)->comment('');
            $table->string('diametro', 10)->nullable(true)->comment('');
            $table->string('clase', 20)->nullable(true)->comment('');
            $table->string('flow', 10)->nullable(true)->comment('');
            $table->string('tipo', 20)->nullable(true)->comment('');
            $table->string('presion', 10)->nullable(true)->comment('');
            $table->string('material', 40)->nullable(true)->comment('');
            $table->string('sustancia', 40)->nullable(true)->comment('');
            $table->string('dias_almacenamiento', 10)->nullable(true)->comment('');
            $table->string('rango', 10)->nullable(true)->comment('');
            $table->string('precision', 10)->nullable(true)->comment('');
            $table->string('capacidad_dinamica', 20)->nullable(true)->comment('');
            $table->string('eficiencia_maxima', 10)->nullable(true)->comment('');
            $table->string('diseno', 20)->nullable(true)->comment('');
            $table->string('cuerpo', 20)->nullable(true)->comment('');
            $table->integer('modelo')->nullable(true)->comment('');
            $table->integer('marca')->nullable(true)->comment('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_equipo');
    }
};
