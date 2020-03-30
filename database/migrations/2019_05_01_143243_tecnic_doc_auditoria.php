<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicDocAuditoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnic_doc_auditoria', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('objetivos');
            $table->integer('proceso_id')->nullable();
            $table->integer('actividad_id')->nullable();
            $table->string('id_persona');
            // $table->integer('id_persona');
            $table->longText('resultados');
            $table->boolean('registrar');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('proceso_id')->references('id')->on('tecnic_proceso')->onDelete('cascade');
            $table->foreign('actividad_id')->references('id')->on('tecnic_actividad')->onDelete('cascade');
            // $table->foreign('persona_id')->references('id')->on('caphum_persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnic_doc_auditoria');
    }
}
