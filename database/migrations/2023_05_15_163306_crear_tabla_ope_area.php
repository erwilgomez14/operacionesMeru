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
        Schema::create('ope_area', function (Blueprint $table) {
            $table->string('id_area', 4)->primary()->nullable()->comment('Clave primaria de la tabla');
            $table->string('nombre_area', 3)->nullable(true)->comment('Nombre del area');
            $table->string('descripcion_area', 150)->nullable(true)->comment('Descripcion del Area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_area');
    }
};
