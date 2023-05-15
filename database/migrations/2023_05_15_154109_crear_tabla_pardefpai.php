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
        Schema::create('pardefpai', function (Blueprint $table) {
            $table->string('codpai', 2)->primary()->nullable()->comment('Código de País');
            $table->string('nompai', 50)->nullable(false)->comment('Nombre del país');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pardefpai');
    }
};
