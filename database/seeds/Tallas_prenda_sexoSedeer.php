<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Tallas_prenda_sexo;

class TallasPrendaSexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Tallas_prenda_sexo::truncate();
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>1
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>2
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>3
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>4
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>5
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>6
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>7
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>8
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>9
        ]);
       Tallas_prenda_sexo::create([
            'prenda_id'=>1,
            'sexo_id'=>1,
            'talla_id'=>10
        ]);
    }
}
