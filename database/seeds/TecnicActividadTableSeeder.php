<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicActividad;

class TecnicActividadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        TecnicActividad::truncate();

        $actividad = array("Sistema de la Gestión de la Calidad", "Medio Ambiente", "Seguridad", "Salud del Trabajo");

        foreach( $actividad as $value )
        {
            TecnicActividad::create([
                'actividad' => "{$value}",
            ]);            
        }
    }
}