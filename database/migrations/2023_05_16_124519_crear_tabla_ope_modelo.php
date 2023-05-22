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
        Schema::create('ope_modelo', function (Blueprint $table) {
            $table->id('id_modelo')->comment('Clave primaria de la tabla');
            $table->string('nombre_modelo', 50)->nullable(true)->comment('Nombre del modelo');
            $table->string('descripcion_modelo', 100)->nullable(true)->comment('Descripcion del modelos');
            $table->string('factor_servicio', 5)->nullable(true)->comment('');
            $table->string('elevacion', 20)->nullable(true)->comment('');
            $table->string('voltaje', 10)->nullable(true)->comment('');
            $table->string('frecuencia', 15)->nullable(true)->comment('');
            $table->string('posicion', 20)->nullable(true)->comment('');
            $table->string('velocidad', 20)->nullable(true)->comment('');
            $table->string('temperatura', 10)->nullable(true)->comment('');
            $table->string('rpm', 20)->nullable(true)->comment('');
            $table->string('hp', 20)->nullable(true)->comment('Caballos de Fuerza o Potencia');
            $table->string('ciclos', 20)->nullable(true)->comment('');
            $table->integer('id_marca')->nullable()->comment('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_modelo');
    }
};
