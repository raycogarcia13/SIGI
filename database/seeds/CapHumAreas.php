<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Areas;

class CapHumAreas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Areas::truncate();
        Areas::create([
            'nombre'=> 'Dirección General',
            'tipo_area'=>'Dirección'
        ]);
        Areas::create([
            'nombre'=>'Recursos Humanos',
            'pertenece'=>1,
            'tipo_area'=>'RRHH'
        ]);
       Areas::create([
            'nombre'=>'Economía',
            'pertenece'=>1,
            'tipo_area'=>'Economía'
        ]);
       Areas::create([
            'nombre'=>'Informática',
            'pertenece'=>1,
            'tipo_area'=>'Informática'
        ]);
       Areas::create([
            'nombre'=>'Contabilidad',
            'pertenece'=>3,
            'tipo_area'=>'Contabilidad'
        ]);
    }
}
