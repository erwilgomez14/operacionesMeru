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
        Schema::create('pardefest', function (Blueprint $table) {
            $table->string('codpai', 2)->nullable()->comment('Referencia al Código de País');
            $table->string('codest', 2)->nullable()->comment('Código de Estado');
            $table->string('nommun', 50)->nullable(false)->comment('Nombre del Estado');
            
            $table->primary(['codpai', 'codest']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pardefest');
    }
};
