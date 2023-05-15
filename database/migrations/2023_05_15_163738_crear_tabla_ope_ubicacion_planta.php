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
        Schema::create('ope_ubicacion_planta', function (Blueprint $table) {
            $table->string('id_ubicpl', 4)->primary()->nullable()->comment('Clave primaria de la tabla');
            $table->string('nombre_ubicpl', 5)->nullable(true)->comment('Nombre de la Ubicacion en Planta');
            $table->string('descripcion_ubicpl', 150)->nullable(true)->comment('Descripcion de la Ubicacion en Planta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_ubicacion_planta');
    }
};
