<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicDerrameProducto;
use Faker\Factory as Faker;

class TecnicDerrameProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        for ($i=0; $i < 10; $i++) { 
            TecnicDerrameProducto::create([
                'fecha' => $faker->dateTime(),
                'tipo_id' => rand(1, 4),
                'afectacion_medioambiente' => rand(0, 1),
                'producto_id' => rand(1, 9),
                'volumen' => rand(1, 100),
                'unidad_id' => rand(1, 7),
                'observacion' => $faker->words(10, 20),
            ]);
        }
    }
}
