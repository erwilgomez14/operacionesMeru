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
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->string('cedula')->comment('Identificador de la tabla ope_usuario');
            $table->unsignedBigInteger('rol_id')->comment('Identificador de la tabla rol');

            //$table->foreign('cedula')->references('cedula')->on('ope_usuario')->onDelete('cascade');
            //$table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade');

            $table->primary(['cedula','rol_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_rol');
    }
};
