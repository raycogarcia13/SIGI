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
            $table->integer('area_id');
            $table->foreign('area_id')->references('id')->on('caphum_areas');
            $table->string('cargo');
            $table->integer('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('caphum_niveles_preparacion');
            $table->boolean('jestablec')->nullable();
            $table->integer('plazas');
            $table->integer('grupo_escala_id');
            $table->foreign('grupo_escala_id')->references('id')->on('caphum_grupo_escala');
            $table->integer('categoria_oc_id');
            $table->foreign('categoria_oc_id')->references('id')->on('caphum_tipos_categorias_ocupacionales');
            $table->integer('tipo_categoria_oc_id')->nullable();
            $table->foreign('tipo_categoria_oc_id')->references('id')->on('caphum_tipos_categorias_ocupacionales');
            $table->boolean('funcionario')->nullable();
            $table->boolean('designado')->nullable();
            $table->boolean('peligroso')->nullable();
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
