<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicUnidadDerrameProducto;

class TecnicUnidadDerrameProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidad = array("mL", "L", "galón", "g", "Kg", "T", "mg", "m³");

        foreach ($unidad as $value) {
            TecnicUnidadDerrameProducto::create([
                'unidad' => "{$value}",
            ]);
        }
    }
}
