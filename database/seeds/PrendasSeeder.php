<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Prendas;

class PrendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Prendas::truncate();
       Prendas::create([
            'nombre'=> 'Zapatos',
            'acronimo'=>'zap',
            'position'=>1
        ]);
       Prendas::create([
            'nombre'=> 'Blusa',
            'acronimo'=>'blusa',
            'position'=>2
        ]);
       Prendas::create([
            'nombre'=> 'Camisa',
            'acronimo'=>'camisa',
            'position'=>3
        ]);
       Prendas::create([
            'nombre'=> 'Gorra',
            'acronimo'=>'gorra',
            'position'=>4
        ]);
       Prendas::create([
            'nombre'=> 'Pantalón',
            'acronimo'=>'pantalón',
            'position'=>5
        ]);
       Prendas::create([
            'nombre'=> 'Salla',
            'acronimo'=>'salla',
            'position'=>6
        ]);
       Prendas::create([
            'nombre'=> 'Pulover',
            'acronimo'=>'pulover',
            'position'=>7
        ]);
       Prendas::create([
            'nombre'=> 'Botas',
            'acronimo'=>'botas',
            'position'=>8
        ]);
       Prendas::create([
            'nombre'=> 'Cinto',
            'acronimo'=>'cinto',
            'position'=>9
        ]);
       Prendas::create([
            'nombre'=> 'Overol',
            'acronimo'=>'overol',
            'position'=>10
        ]);
    }
}
