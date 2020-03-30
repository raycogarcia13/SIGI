<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\TallaPantalon;

class TallaPantalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TallaPantalon::truncate();
       TallaPantalon::create([
            'nombre'=> '28',
            'acronimo'=>'28',
            'position'=>1
        ]);
       TallaPantalon::create([
            'nombre'=> '29',
            'acronimo'=>'29',
            'position'=>2
        ]);
       TallaPantalon::create([
            'nombre'=> '30',
            'acronimo'=>'30',
            'position'=>3
        ]);
       TallaPantalon::create([
            'nombre'=> '31',
            'acronimo'=>'31',
            'position'=>4
        ]);
       TallaPantalon::create([
            'nombre'=> '32',
            'acronimo'=>'32',
            'position'=>5
        ]);
       TallaPantalon::create([
            'nombre'=> '33',
            'acronimo'=>'33',
            'position'=>6
        ]);
       TallaPantalon::create([
            'nombre'=> '34',
            'acronimo'=>'34',
            'position'=>7
        ]);
       TallaPantalon::create([
            'nombre'=> '35',
            'acronimo'=>'35',
            'position'=>8
        ]);
       TallaPantalon::create([
            'nombre'=> '36',
            'acronimo'=>'36',
            'position'=>9
        ]);
       TallaPantalon::create([
            'nombre'=> '37',
            'acronimo'=>'37',
            'position'=>10
        ]);
       TallaPantalon::create([
            'nombre'=> '38',
            'acronimo'=>'38',
            'position'=>11
        ]);
       TallaPantalon::create([
            'nombre'=> '38',
            'acronimo'=>'38',
            'position'=>12
        ]);
       TallaPantalon::create([
            'nombre'=> '39',
            'acronimo'=>'39',
            'position'=>13
        ]);
       TallaPantalon::create([
            'nombre'=> '40',
            'acronimo'=>'40',
            'position'=>14
        ]);
       TallaPantalon::create([
            'nombre'=> '41',
            'acronimo'=>'41',
            'position'=>15
        ]);
       TallaPantalon::create([
            'nombre'=> '42',
            'acronimo'=>'42',
            'position'=>16
        ]);
       TallaPantalon::create([
            'nombre'=> '43',
            'acronimo'=>'43',
            'position'=>17
        ]);
       TallaPantalon::create([
            'nombre'=> '44',
            'acronimo'=>'44',
            'position'=>18
        ]);
       TallaPantalon::create([
            'nombre'=> '45',
            'acronimo'=>'45',
            'position'=>19
        ]);
    }
}
