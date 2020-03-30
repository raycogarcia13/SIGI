<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicActualizarSistemaComputos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnic_actualizar_sistema_computos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('generales_id');
            $table->integer('sistema_id');
            $table->integer('accion_id');
            $table->string('version_id');
            $table->integer('especialista_actualiza_id');
            $table->integer('especialista_supervisa_id');
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('generales_id')->references('id')->on('tecnic_generales_actualizar_sistema_computos')->onDelete('cascade');
            $table->foreign('sistema_id')->references('id')->on('tecnic_gestionar_computos')->onDelete('cascade');
            $table->foreign('accion_id')->references('id')->on('tecnic_accion_actualizar_sistema_computos')->onDelete('cascade');
            // $table->foreign('especialista_actualiza_id')->references('id')->on('caphum_persona')->onDelete('cascade');
            // $table->foreign('especialista_supervisa_id')->references('id')->on('caphum_persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnic_actualizar_sistema_computos');
    }
}
