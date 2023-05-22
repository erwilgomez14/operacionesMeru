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
        Schema::create('ope_usuario', function (Blueprint $table) {
            $table->string('cedula', 8)->nullable()->comment('LLave primaria, Cedula de los usuarios');
            $table->string('usuario', 12)->nullable($value = true)->comment('Alias de usuario asignado');
            $table->string('nombre', 50)->nullable($value = true)->comment('Nombre del usuario');            
            $table->string('cargo', 100)->nullable($value = true)->comment('Cargo de usuario');            
            $table->string('id_grupo', 3)->nullable($value = true)->comment('Nombre de cada grupo de usuario');            
            $table->string('coduni', 20)->nullable($value = true)->comment('');
            
            $table->primary('cedula');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_usuario');
    }
};
