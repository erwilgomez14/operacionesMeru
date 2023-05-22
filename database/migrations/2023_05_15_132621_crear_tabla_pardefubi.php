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
        Schema::create('pardefubi', function (Blueprint $table) {
            $table->string('codubi', 3)->primary()->nullable()->comment('Código de ubicación');
            $table->string('codpai', 2)->nullable(true)->comment('Referencia al código de País');
            $table->string('codest', 2)->nullable(true)->comment('Referencia al código de Estado');
            $table->string('codmun', 2)->nullable(true)->comment('Referencia al código de municipio');
            $table->string('codloc', 3)->nullable(true)->comment('Referencia al código de localidad');
            $table->string('desubi', 200)->nullable(true)->comment('Descripción de la ubicación');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pardefubi');
    }
};
