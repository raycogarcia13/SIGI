<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePromedioTrabajadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promedio_trabajadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('obreros');
            $table->integer('obr_m');
            $table->integer('tecnicos');
            $table->integer('tec_m');
            $table->integer('administrativos');
            $table->integer('adm_m');
            $table->integer('servicios');
            $table->integer('ser_m');
            $table->integer('dirigentes');
            $table->integer('dir_m');

            $table->integer('periodo_prueba');
            $table->integer('cert_medico');
            $table->integer('baja');
            $table->integer('alta');

            $table->integer('total');
            $table->integer('total_m');
            $table->integer('dia');
            $table->integer('mes');
            $table->integer('anno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promedio_trabajadores');
    }
}
