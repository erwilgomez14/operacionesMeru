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
        Schema::create('ope_marca', function (Blueprint $table) {
            $table->increments('id_marca')->comment('Clave primaria de la tabla');
            $table->string('nombre_marca', 100)->nullable(true)->comment('Nombre de la marca');
            $table->string('descripcion_marca', 200)->nullable(true)->comment('Descripcion de la marca');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_marca');
    }
};
