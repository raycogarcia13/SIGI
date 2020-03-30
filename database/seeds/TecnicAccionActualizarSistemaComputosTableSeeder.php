<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicAccionActualizarSistemaComputos;

class TecnicAccionActualizarSistemaComputosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecnicAccionActualizarSistemaComputos::truncate();

        $acciones = array("Instalación de parches de seguridad, ", "Instalación de nuevas versiones");

        foreach( $acciones as $value )
        {
            TecnicAccionActualizarSistemaComputos::create([
                'accion' => "{$value}",
            ]);            
        }
    }
}
