<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicClasificacionIncidenciaTecnologia;

class TecnicClasificacionIncidenciaTecnologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clasificacion = array("Rotura del equipo", "Violación del sello de seguridad", "Violación de políticas de seguridad informática", "Robo de componentes internos", "Robo de componentes externos");

        TecnicClasificacionIncidenciaTecnologia::truncate();

        foreach( $clasificacion as $value )
        {
            TecnicClasificacionIncidenciaTecnologia::create([
                'clasificacion' => "{$value}",
            ]);            
        }
    }
}
