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
        Schema::create('ope_odt_usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('id_odt');
            $table->string('cedula');

            $table->foreign('id_odt')->references('id_orden')->on('ope_orden_trabajo');
            $table->foreign('cedula')->references('cedula')->on('ope_usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_odt_usuario');
    }
};
