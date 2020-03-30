<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicGeneralesActualizarSistemaComputos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnic_generales_actualizar_sistema_computos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('generales');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnic_generales_actualizar_sistema_computos');
    }
}
