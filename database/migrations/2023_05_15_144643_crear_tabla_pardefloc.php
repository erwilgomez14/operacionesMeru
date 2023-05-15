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
        Schema::create('pardefloc', function (Blueprint $table) {
            $table->string('codpai', 3)->nullable()->comment('Referencia al Código de País');
            $table->string('codest', 2)->nullable()->comment('Referencia al Código de Estado');
            $table->string('codloc', 2)->nullable()->comment('Código de localidad');
            $table->string('nomloc', 50)->nullable(false)->comment('Nombre de localidad');
            $table->string('aliloc', 50)->nullable(true)->comment('Alias de Localidad');
            $table->string('codmun', 2)->nullable()->comment('Referencia al Código de Municipio');
            $table->string('codlocsig', 2)->nullable(true)->comment('');

            $table->primary(['codpai', 'codest', 'codloc', 'codmun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pardefloc');
    }
};
