<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaphumPlantilla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caphum_plantilla_cargos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('area');
            $table->foreign('area')->references('id')->on('caphum_areas');
            $table->integer('categoria_ocupacional');
            $table->integer('tipo_categoria_ocupacional');
            $table->integer('cantidad_cargos');
            $table->integer('nivel_preparacion');
            $table->integer('grupo_escala');
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
        Schema::dropIfExists('caphum_plantilla_cargos');
    }
}
