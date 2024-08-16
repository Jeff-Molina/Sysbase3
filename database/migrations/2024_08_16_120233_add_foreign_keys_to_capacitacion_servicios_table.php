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
        Schema::table('capacitacion_servicios', function (Blueprint $table) {
            $table->foreign(['cliente_id'], 'fk_servicios_clientes')->references(['id'])->on('capacitacion_clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['equipo_id'], 'fk_servicios_equipos1')->references(['id'])->on('capacitacion_equipos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['estado_id'], 'fk_servicios_estados1')->references(['id'])->on('capacitacion_estados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'fk_servicios_usuarios1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('capacitacion_servicios', function (Blueprint $table) {
            $table->dropForeign('fk_servicios_clientes');
            $table->dropForeign('fk_servicios_equipos1');
            $table->dropForeign('fk_servicios_estados1');
            $table->dropForeign('fk_servicios_usuarios1');
        });
    }
};
