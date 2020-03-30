<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCaphumCapacTrabajador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caphum_capacitacion_trabajador', function (Blueprint $table) {
            $table->integer('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('caphum_trabajador');
            $table->integer('curso_id');
            $table->foreign('curso_id')->references('id')->on('caphum_capacitacion');
            $table->primary(['trabajador_id','curso_id']);
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
        Schema::dropIfExists('caphum_capacitacion_trabajador');
    }
}
