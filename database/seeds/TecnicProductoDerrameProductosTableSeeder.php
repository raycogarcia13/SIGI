<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\TecnicProductoDerrameProducto;

class TecnicProductoDerrameProductosTableSeeder extends Seeder
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
            TecnicProductoDerrameProducto::create([
                'producto' => $faker->words(1, 1),
            ]);
        }
    }
}
