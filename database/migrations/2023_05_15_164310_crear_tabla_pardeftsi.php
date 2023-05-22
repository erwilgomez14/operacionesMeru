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
        Schema::create('pardeftsi', function (Blueprint $table) {
            $table->string('id_pardeftsi', 1)->primary()->nullable()->comment('Clave primaria de la tabla');
            $table->string('nombre_partsi', 50)->nullable(true)->comment('Nombre del Tipo de Sistema');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pardeftsi');
    }
};
