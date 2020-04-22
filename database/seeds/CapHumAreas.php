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
            'nombre'=>'Capital Humanos',
            'pertenece'=>1,
            'tipo_area'=>'RRHH'
        ]);
       Areas::create([
            'nombre'=>'Contable - Finaciera',
            'pertenece'=>1,
            'tipo_area'=>'Economía'
        ]);
       Areas::create([
            'nombre'=>'Técnica',
            'pertenece'=>1,
            'tipo_area'=>'Técnica'
        ]);
       Areas::create([
            'nombre'=>'Informática',
            'pertenece'=>1,
            'tipo_area'=>'Informática'
        ]);
       Areas::create([
            'nombre'=>'Operaciones',
            'pertenece'=>1,
            'tipo_area'=>'Operaciones'
        ]);
       Areas::create([
            'nombre'=>'Brigada de Operaciones',
            'pertenece'=>6,
            'tipo_area'=>'Brigada de Operaciones'
        ]);
       Areas::create([
            'nombre'=>'Comercial',
            'pertenece'=>1,
            'tipo_area'=>'Comercial'
        ]);
       Areas::create([
            'nombre'=>'Mecanización',
            'pertenece'=>1,
            'tipo_area'=>'Mecanización'
        ]);
       Areas::create([
            'nombre'=>'Aseguramientos Generales',
            'pertenece'=>1,
            'tipo_area'=>'Aseguramientos Generales'
        ]);
    }
}
