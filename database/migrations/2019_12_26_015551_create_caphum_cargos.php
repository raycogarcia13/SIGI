<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaphumCargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caphum_cargos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cargo');
            $table->boolean('jefe_area');
            $table->double('salario_escala')->nullable();
            $table->double('perfeccionamiento')->nullable();
            $table->double('cla')->nullable();
            $table->double('ac')->nullable();
            $table->double('gps')->nullable();
            $table->double('cies')->nullable();
            $table->double('salario_total')->nullable();

            $table->integer('categoria_oc_id')->nullable();
            $table->foreign('categoria_oc_id')->references('id')->on('caphum_tipos_categorias_ocupacionales');
            $table->integer('grupo_escala_id')->nullable();
            $table->foreign('grupo_escala_id')->references('id')->on('caphum_grupo_escala');
            
            $table->integer('establecimiento_id');
            $table->foreign('establecimiento_id')->references('id')->on('caphum_establecimiento');
            $table->integer('trabajador_id')->nullable();
            $table->foreign('trabajador_id')->references('id')->on('caphum_trabajador');
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
        Schema::dropIfExists('caphum_cargos');
    }
}
