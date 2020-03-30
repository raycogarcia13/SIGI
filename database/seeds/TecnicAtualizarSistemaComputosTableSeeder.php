<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicActualizarSistemaComputos;

class TecnicAtualizarSistemaComputosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecnicActualizarSistemaComputos::truncate();

        for ($i=0; $i < 10; $i++) { 
            TecnicActualizarSistemaComputos::create([
                'generales_id' => rand(1, 3),
                'sistema_id' => rand(1, 5),
                'accion_id' => rand(1, 2),
                'version_id'  => rand(1, 10),
                'especialista_actualiza_id'  => rand(1, 10),
                'especialista_supervisa_id'  => rand(1, 10),
            ]);
        }

    }
}
