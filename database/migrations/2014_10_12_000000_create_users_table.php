<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('position');
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('fecha_inactivado')->nullable();;
            $table->date('password_change')->nullable();;
            $table->string('password');
            $table->boolean('is_trabajador');
            $table->boolean('activo');
            $table->integer('invitado_id')->nullable();
            $table->integer('trabajador_id')->nullable();

            $table->foreign('trabajador_id')->references('id')->on('caphum_trabajador');
            $table->foreign('invitado_id')->references('id')->on('config_invitado');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_usuario');
    }
}
