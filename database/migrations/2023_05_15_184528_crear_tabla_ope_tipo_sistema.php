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
        Schema::create('ope_tipo_sistema', function (Blueprint $table) {
            $table->string('id_tipo_sistema', 2)->primary()->nullable()->comment('Clave primaria de la tabla');
            $table->string('descripcion_tipo',5)->nullable(true)->comment('Descripcion del Tipo de Sistema');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_tipo_sistema');
    }
};
