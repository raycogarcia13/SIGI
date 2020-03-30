<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicGeneralesActualizarSistemaComputos;

class TecnicGeneralesActualizarSistemaComputosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecnicGeneralesActualizarSistemaComputos::truncate();

        $generales = array("Instalación de parches de seguridad", "Instalación de nuevas versiones", "Instalación de nuevas funcionalidades en la misma versión");

        foreach( $generales as $value )
        {
            TecnicGeneralesActualizarSistemaComputos::create([
                'generales' => "{$value}",
            ]);            
        }
    }
}
