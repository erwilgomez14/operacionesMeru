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
        Schema::create('pardefmun', function (Blueprint $table) {
            $table->string('codpai', 2)->nullable()->comment('Referencia al Código de País');
            $table->string('codest', 2)->nullable()->comment('Referencia al Código de Estado');
            $table->string('codmun', 2)->nullable()->comment('Código de Municipio');
            $table->string('nommun', 50)->nullable(false)->comment('Nombre de Municipio');
            $table->string('alimun', 50)->nullable(true)->comment('Alias del Municipio');
            
            $table->primary(['codpai', 'codest', 'codmun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pardefmun');
    }
};
