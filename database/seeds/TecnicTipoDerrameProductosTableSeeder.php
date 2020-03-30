<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TecnicTipoDerrameProducto;

class TecnicTipoDerrameProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        for ($i=0; $i < 5; $i++) { 
            TecnicTipoDerrameProducto::create([
                'tipo' => $faker->words(1, 3),
            ]);
        }
    }
}
