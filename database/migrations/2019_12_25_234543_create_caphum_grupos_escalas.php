<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaphumGruposEscalas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caphum_grupos_escalas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->float('salario_escala', 8, 2);
            $table->float('tarifa_horaria');
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
        Schema::dropIfExists('caphum_grupos_escalas');
    }
}
