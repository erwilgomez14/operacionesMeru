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
        Schema::create('rol_permiso', function (Blueprint $table) {
            $table->unsignedBigInteger('rol_id')->comment('Id de los roles');
            $table->unsignedBigInteger('permiso_id')->comment('Id de los permisos');

           // $table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade');
            //$table->foreign('permiso_id')->references('id')->on('permiso')->onDelete('cascade');

            $table->primary(['rol_id','permiso_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rol_permiso');

    }
};
