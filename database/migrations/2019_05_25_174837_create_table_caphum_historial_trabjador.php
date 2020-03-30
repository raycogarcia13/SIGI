<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCaphumHistorialTrabjador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caphum_historial_trabjador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('caphum_trabajador');
            $table->string('tipo_movimiento');
            $table->timestamp('fecha');
            $table->string('grupo_escala');
            $table->string('cargo');
            $table->double('salario');
            $table->double('establecimiento');
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
        Schema::dropIfExists('caphum_historial_trabjador');
    }
}
