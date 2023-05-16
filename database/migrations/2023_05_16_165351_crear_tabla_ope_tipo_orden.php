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
        Schema::create('ope_tipo_orden', function (Blueprint $table) {
            $table->id('id_tipo_orden')->comment('Identificador de la tabla');
            $table->string('desc_orden', 20)->comment('Descripcion del tipo de orden');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_tipo_orden');
    }
};
