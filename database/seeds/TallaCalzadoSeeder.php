<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\TallaCalzado;

class TallaCalzadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TallaCalzado::truncate();
       TallaCalzado::create([
            'nombre'=> 'S',
            'acronimo'=>'S',
            'position'=>1
        ]);
       TallaCalzado::create([
            'nombre'=> 'M',
            'acronimo'=>'M',
            'position'=>2
        ]);
       TallaCalzado::create([
            'nombre'=> 'L',
            'acronimo'=>'L',
            'position'=>3
        ]);
       TallaCalzado::create([
            'nombre'=> 'XL',
            'acronimo'=>'XL',
            'position'=>4
        ]);
       TallaCalzado::create([
            'nombre'=> 'XXL',
            'acronimo'=>'XXL',
            'position'=>5
        ]);
       TallaCalzado::create([
            'nombre'=> 'XXXL',
            'acronimo'=>'XXXL',
            'position'=>6
        ]);
    }
}
