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
            $table->integer('area');
            $table->foreign('area')->references('id')->on('caphum_areas');
            $table->string('cargo');
            $table->integer('nivel');
            $table->foreign('nivel')->references('id')->on('caphum_niveles_preparacion');
            $table->boolean('jestablec')->nullable();
            $table->integer('plazas');
            $table->integer('grupos_escala');
            $table->foreign('grupos_escala')->references('id')->on('caphum_grupos_escalas');
            $table->integer('categoria_oc');
            $table->foreign('categoria_oc')->references('id')->on('caphum_categorias_ocupacionales');
            $table->integer('tipo_categoria_oc')->nullable();
            $table->foreign('tipo_categoria_oc')->references('id')->on('caphum_tipos_categorias_ocupacionales');
            $table->boolean('funcionario')->nullable();
            $table->boolean('designado')->nullable();
            $table->boolean('peligroso')->nullable();
            $table->integer('position');
            $table->boolean('activo');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
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
