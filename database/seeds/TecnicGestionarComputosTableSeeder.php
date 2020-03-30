<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicGestionarComputos;

use Faker\Factory as Faker;

class TecnicGestionarComputosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        TecnicGestionarComputos::truncate();

        for ($i=0; $i < 10; $i++) { 

            $version = rand(1, 3) . "." . rand(1, 3) . "." . rand(1, 3);
            TecnicGestionarComputos::create([
                // 'nombre_sistema' => Str::words($texto, 3),
                'nombre_sistema' => $faker->text($maxNbChars = 20),
                'version' => $version,
                'descripción' => $faker->words(5, 13),
                'en_uso' => rand(0, 1),
                'administra' => $faker->name,
                'observaciones' => $faker->paragraph,
            ]); 
        }
        
    }
}
