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
        Schema::create('capacitacion_servicios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('cliente_id')->index('fk_servicios_clientes_idx');
            $table->integer('estado_id')->index('fk_servicios_estados1_idx');
            $table->integer('equipo_id')->index('fk_servicios_equipos1_idx');
            $table->unsignedBigInteger('user_id')->index('fk_servicios_usuarios1_idx');
            $table->decimal('precio', 10)->nullable();
            $table->date('fecha_recepcion');
            $table->text('problema');
            $table->date('fecha_diagnostico')->nullable();
            $table->string('diagnostico', 45)->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->text('solucion')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('capacitacion_servicios');
    }
};
