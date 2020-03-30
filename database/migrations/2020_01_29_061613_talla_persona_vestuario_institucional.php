<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TallaPersonaVestuarioInstitucional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caphum_tallas_persona_vestuario_institucional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('talla_id');
            // $table->unsignedInteger('persona_id');
            $table->unsignedInteger('prenda_id');
            $table->foreign('talla_id')->references('id')->on('caphum_tallas')->onDelete('cascade');
            // $table->foreign('persona_id')->references('id')->on('caphum_personas')->onDelete('cascade');
            $table->foreign('prenda_id')->references('id')->on('caphum_prendas')->onDelete('cascade');
            $table->integer('position');
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
        Schema::dropIfExists('caphum_tallas_persona_vestuario_institucional');
    }
}
