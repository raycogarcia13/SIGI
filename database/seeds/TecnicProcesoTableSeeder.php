<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicProceso;

class TecnicProcesoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecnicProceso::truncate();

        $procesos = array("Comercialización", "Operaciones", "Transporte", "Compra", "Capital Humanos", "Mantenimiento");

        foreach( $procesos as $value )
        {
            TecnicProceso::create([
                'proceso' => "{$value}",
            ]);
        }
    }
}
