<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TecnicDerrameProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnic_derrame_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->unsignedInteger('tipo_id'); // uninteger('tipo_id');
            $table->boolean('afectacion_medioambiente');
            $table->integer('producto_id');
            $table->integer('volumen');
            $table->integer('unidad_id');
            $table->text('observacion');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipo_id')->references('id')->on('tecnic_tipo_derrame_productos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('tecnic_producto_derrame_productos')->onDelete('cascade');
            $table->foreign('unidad_id')->references('id')->on('tecnic_unidad_derrame_productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnic_derrame_productos');
    }
}
