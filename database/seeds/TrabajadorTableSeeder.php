<?php

use Illuminate\Database\Seeder;
use App\Models\Trabajador;

class TrabajadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trabajador::truncate();
        Trabajador::create([
            'num'=> '123',
            'ci'=> '12345678912',
            'nombre'=> 'Nombre 1',
            'primer_apellido'=> 'App 1',
            'segundo_apellido'=> 'App 1',
            'edad'=>23,
            'sexo'=>'Masculino'
        ]);
        Trabajador::create([
            'num'=> '456',
            'ci'=> '98765432101',
            'nombre'=> 'Nombre 2',
            'primer_apellido'=> 'App 2',
            'segundo_apellido'=> 'App 2',
            'edad'=>25,
            'sexo'=>'Femenino'
        ]);
    }
}
