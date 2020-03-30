<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicIncidenciaTecnologia;
use Faker\Factory as Faker;

class TecnicIncidenciaTecnologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        TecnicIncidenciaTecnologia::truncate();

        for ($i=0; $i < 10; $i++) { 
            TecnicIncidenciaTecnologia::create([
                "tecnologia" => $faker->words(3, 5),
                "responsable_id" => rand(1, 10),
                "area" => $faker->words(3, 5),
                "fecha" => $faker->dateTime(),
                "descripcion" => $faker->words(5, 15),
                "clasificacion_id" => rand(1, 5),
                "estado_id" => rand(1, 3),
                "atendida_id" => rand(1, 3),
                "observacion" => $faker->words(10, 30),
            ]);
        }

    }
}
