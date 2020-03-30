<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CaphumTrabajadorRemoveExtrasfields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caphum_trabajador', function (Blueprint $table) {
            $table->integer('edad')->nullable();
            $table->string('sexo')->nullable()->after('segundo_apellido');
            $table->string('raza')->nullable()->after('sexo');
            $table->integer('nivel_prep_id')->nullable()->after('raza');
            $table->foreign('nivel_prep_id')->references('id')->on('caphum_nivel_prep')->onDelete('cascade');
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
        Schema::table('caphum_trabajador', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn('edad');
            $table->dropColumn('sexo');
            $table->dropColumn('raza');
            $table->dropColumn('nivel_prep_id');
        });
    }
}
