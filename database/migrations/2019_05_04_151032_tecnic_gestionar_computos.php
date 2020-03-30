<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicGestionarComputos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnic_gestionar_computos', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('nombre_sistema');
            $table->string('version');
            $table->text('descripción');
            $table->boolean('en_uso');
            $table->string('administra');
            $table->longText('observaciones');
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
        Schema::dropIfExists('tecnic_gestionar_computos');
    }
}
