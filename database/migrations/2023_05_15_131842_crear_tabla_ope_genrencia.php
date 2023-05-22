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
        Schema::create('ope_gerencia', function (Blueprint $table) {
            $table->string('id_gerencia', 3)->nullable()->comment('Clave primaria de la tabla');
            $table->string('nombre_gerencia', 50)->nullable($value = true)->comment('Nombre de la Gerencia');

            $table->primary('id_gerencia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_gerencia');
    }
};
