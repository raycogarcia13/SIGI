<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Cargos;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Cargos::truncate();
       Cargos::create([
            'area'=>1,
            'cargo'=>'Director',
            'nivel'=>1,
            'jestablec'=>True,
            'plazas'=>1,
            'grupos_escala'=>15,
            'categoria_oc'=>5,
            'tipo_categoria_oc'=>1,
            'funcionario'=>True,
            'designado'=>True,
            'peligroso'=>False,
            'position'=>1,
            'activo'=>True
        ]);
    }
}
