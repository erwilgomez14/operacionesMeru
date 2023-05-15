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
        Schema::create('usuario_permiso', function (Blueprint $table) {
            $table->string('cedula')->comment('Cedula de los usuarios');
            $table->unsignedBigInteger('permiso_id')->comment('Id de los permisos');

            //$table->foreign('cedula')->references('cedula')->on('ope_usuario')->onDelete('cascade');
            //$table->foreign('permiso_id')->references('id')->on('permiso')->onDelete('cascade');

            $table->primary(['cedula','permiso_id']);
        });
    }

    /** php artisan migrate --path=/database/migrations/2023_03_22_131916_crear_tabla_rol_permiso.php
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_permiso');

    }
};
