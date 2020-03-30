<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicIncidenciaTecnologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnic_incidencia_tecnologia', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tecnologia');
            $table->integer('responsable_id');
            $table->string('area');
            $table->dateTime('fecha');
            $table->text('descripcion');
            $table->integer('clasificacion_id');
            $table->integer('estado_id');
            $table->integer('atendida_id');
            $table->text('observacion');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('responsable_id')->references('id')->on('caphum_persona')->onDelete('cascade');
            $table->foreign('clasificacion_id')->references('id')->on('tecnic_clasificacion_incidencia_tecnologia')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('tecnic_estado_incidencia_tecnologia')->onDelete('cascade');
            // $table->foreign('atendida_id')->references('id')->on('caphum_persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnic_incidencia_tecnologia');
    }
}
