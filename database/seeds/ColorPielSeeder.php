<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\ColorPiel;

class ColorPielSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ColorPiel::truncate();
       ColorPiel::create([
            'nombre'=> 'Blanca',
            'acronimo'=>'B',
            'position'=>1
        ]);
       ColorPiel::create([
            'nombre'=> 'Negra',
            'acronimo'=>'N',
            'position'=>2
        ]);
       ColorPiel::create([
            'nombre'=> 'Mestiza',
            'acronimo'=>'M',
            'position'=>3
        ]);
    }
}
