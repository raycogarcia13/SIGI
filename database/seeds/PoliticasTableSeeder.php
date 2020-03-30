<?php

use Illuminate\Database\Seeder;
use App\Models\Politicas;

class PoliticasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Politicas::truncate();
        Politicas::create([
            'longitud_minima'=> 8,
            'intentos_fallidos'=>3,
            'notif_vencimiento'=>5,
            'tiempo_validez'=>30,
            'mayusculas'=>true,
            'numeros'=>true,
            'carac_especiales'=>true
        ]);
    }
}
