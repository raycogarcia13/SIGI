<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\CentrosEstudio;

class CentrosEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       CentrosEstudio::truncate();
       CentrosEstudio::create([
            'nombre'=> 'Universidad de La Habana',
            'acronimo'=>'UH',
            'position'=>1
        ]);
       CentrosEstudio::create([
            'nombre'=> 'Universidad Isla de la Juventud Jesús Montané Oropesa',
            'acronimo'=>'UIJ',
            'position'=>2
        ]);
       CentrosEstudio::create([
            'nombre'=> 'Instituto Politécnico Superior José Antonio Hecheverría',
            'acronimo'=>'CUJAE',
            'position'=>3
        ]);
       CentrosEstudio::create([
            'nombre'=> 'Instituto Superior Pedagógico José Varona',
            'acronimo'=>'El Varona',
            'position'=>4
        ]);
    }
}
