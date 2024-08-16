<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitacion_equipos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('marca_id')->index('fk_equipos_marcas1_idx');
            $table->integer('modelo_id')->index('fk_equipos_modelos1_idx');
            $table->integer('tipo_id')->index('fk_equipos_tipos1_idx');
            $table->string('numero_serie', 100);
            $table->string('imei', 100)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('update_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacitacion_equipos');
    }
};
