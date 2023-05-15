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
        Schema::create('ope_subsistema', function (Blueprint $table) {
            $table->string('id_subsistema', 15)->primary()->nullable()->comment('Clave primaria de la tabla');
            $table->string('id_sistema', 11)->nullable(false)->comment('Identificador de la tabla ope_sistema');
            $table->string('nombre_subsistema', 50)->nullable(true)->comment('Nombre del Subsistema');
            $table->string('desc_subsistema', 100)->nullable(true)->comment('Descripcion del Subsistema');
            $table->string('id_estatus',1)->nullable(true)->comment('identificador de la tabla pardefest');
            $table->string('posicion_tecnica',3)->nullable(true)->comment('Posicion Tecnica del Subsistema');
            $table->integer('capacidad_subsistema')->nullable(true)->comment('Capacidad instalada del subsistema medida en Litros por segundo');
            $table->text('observacion')->nullable(true)->comment('Observacion');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ope_subsistema');
    }
};
