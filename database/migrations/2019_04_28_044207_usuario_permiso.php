<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioPermiso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_usuario_permiso', function (Blueprint $table) {
            $table->integer('usuario_id');
            $table->integer('permiso_id');
            $table->foreign('permiso_id')->references('id')->on('config_permisos');
            $table->foreign('usuario_id')->references('id')->on('config_usuario');
            $table->primary(['usuario_id', 'permiso_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_usuario_permiso');
    }
}
