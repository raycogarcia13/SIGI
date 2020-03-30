<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TallasPrendaSexo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caphum_tallas_prenda_sexo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('prenda_id');
            $table->unsignedInteger('sexo_id');
            $table->unsignedInteger('talla_id');
            $table->foreign('talla_id')->references('id')->on('caphum_tallas')->onDelete('cascade');
            $table->foreign('sexo_id')->references('id')->on('caphum_sexo')->onDelete('cascade');
            $table->foreign('prenda_id')->references('id')->on('caphum_prendas')->onDelete('cascade');
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
        Schema::dropIfExists('caphum_tallas_prenda_sexo');
    }
}
