<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicEstadoIncidenciaTecnologia;

class TecnicEstadoIncidenciaTecnologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = array("Solucionadas", "Parcialmente solucionadas", "No solucionadas", "Bajo investigación");

        TecnicEstadoIncidenciaTecnologia::truncate();

        foreach ($estado as $value) {
            TecnicEstadoIncidenciaTecnologia::create([
                'estado' => "{$value}",
            ]);    
        }
    }
}
