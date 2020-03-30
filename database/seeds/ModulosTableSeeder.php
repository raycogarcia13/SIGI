<?php

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modulo::truncate();
        Modulo::create([
            'nombre'=> 'config',
            'mostrar'=>'Configuraciones'
        ]);
        Modulo::create([
            'nombre'=> 'econom',
            'mostrar'=>'Dirección Contable y Financiera'
        ]);
        Modulo::create([
            'nombre'=> 'caphum',
            'mostrar'=>'Capital Humano'
        ]);
        Modulo::create([
            'nombre'=> 'contra',
            'mostrar'=>'Contratación'
        ]);
        Modulo::create([
            'nombre'=> 'tecnic',
            'mostrar'=>'Técnica'
        ]);
        Modulo::create([
            'nombre'=> 'contaud',
            'mostrar'=>'Control y Auditoría'
        ]);
        Modulo::create([
            'nombre'=> 'operac',
            'mostrar'=>'Operaciones'
        ]);
        Modulo::create([
            'nombre'=> 'mecani',
            'mostrar'=>'Mecanización'
        ]);
        Modulo::create([
            'nombre'=> 'comerc',
            'mostrar'=>'Comercial'
        ]);
        Modulo::create([
            'nombre'=> 'asegur',
            'mostrar'=>'Aseguramiento'
        ]);
    }
}
