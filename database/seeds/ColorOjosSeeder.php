<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\ColorOjos;

class ColorOjosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ColorOjos::truncate();
       ColorOjos::create([
            'nombre'=> 'Negro',
            'acronimo'=>'N',
            'position'=>1
        ]);
       ColorOjos::create([
            'nombre'=> 'Pardo',
            'acronimo'=>'P',
            'position'=>2
        ]);
       ColorOjos::create([
            'nombre'=> 'Verde',
            'acronimo'=>'V',
            'position'=>3
        ]);
       ColorOjos::create([
            'nombre'=> 'Azul',
            'acronimo'=>'A',
            'position'=>4
        ]);
    }
}
