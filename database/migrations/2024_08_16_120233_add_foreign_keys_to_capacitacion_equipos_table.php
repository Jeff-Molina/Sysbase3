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
        Schema::table('capacitacion_equipos', function (Blueprint $table) {
            $table->foreign(['marca_id'], 'fk_equipos_marcas1')->references(['id'])->on('capacitacion_marcas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['modelo_id'], 'fk_equipos_modelos1')->references(['id'])->on('capacitacion_modelos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tipo_id'], 'fk_equipos_tipos1')->references(['id'])->on('capacitacion_tipos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('capacitacion_equipos', function (Blueprint $table) {
            $table->dropForeign('fk_equipos_marcas1');
            $table->dropForeign('fk_equipos_modelos1');
            $table->dropForeign('fk_equipos_tipos1');
        });
    }
};
