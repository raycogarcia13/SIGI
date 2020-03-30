<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigPoliticasContrasenas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_politicas_contrasenas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('longitud_minima');
            $table->integer('intentos_fallidos');
            $table->integer('notif_vencimiento');
            $table->integer('tiempo_validez');
            $table->boolean('mayusculas');
            $table->boolean('numeros');
            $table->boolean('carac_especiales');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_politicas_contrasenas');
    }
}
