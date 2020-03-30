<?php

use Illuminate\Database\Seeder;
use App\Models\Provincias;

class ProvinciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Provincias::truncate();
       Provincias::create([
            'nombre'=> 'Pinar del Río',
            'acronimo'=>'pr',
            'position'=>1
        ]);
       Provincias::create([
            'nombre'=> 'Artemisa',
            'acronimo'=>'ar',
            'position'=>2
        ]);
       Provincias::create([
            'nombre'=> 'La Habana',
            'acronimo'=>'lh',
            'position'=>3
        ]);
       Provincias::create([
            'nombre'=> 'Mayabeque',
            'acronimo'=>'my',
            'position'=>4
        ]);
       Provincias::create([
            'nombre'=> 'Matanzas',
            'acronimo'=>'mt',
            'position'=>5
        ]);
       Provincias::create([
            'nombre'=> 'Villa Clara',
            'acronimo'=>'vc',
            'position'=>6
        ]);
       Provincias::create([
            'nombre'=> 'Cienfuegos',
            'acronimo'=>'cf',
            'position'=>7
        ]);
       Provincias::create([
            'nombre'=> 'Sancti Spíritus',
            'acronimo'=>'ss',
            'position'=>8
        ]);
       Provincias::create([
            'nombre'=> 'Ciego de Ávila',
            'acronimo'=>'ca',
            'position'=>9
        ]);
       Provincias::create([
            'nombre'=> 'Camagüey',
            'acronimo'=>'cm',
            'position'=>10
        ]);
       Provincias::create([
            'nombre'=> 'Las Tunas',
            'acronimo'=>'lt',
            'position'=>11
        ]);
       Provincias::create([
            'nombre'=> 'Granma',
            'acronimo'=>'gr',
            'position'=>12
        ]);
       Provincias::create([
            'nombre'=> 'Holguín',
            'acronimo'=>'hl',
            'position'=>13
        ]);
       Provincias::create([
            'nombre'=> 'Sangiago de Cuba',
            'acronimo'=>'sc',
            'position'=>14
        ]);
       Provincias::create([
            'nombre'=> 'Guantánamo',
            'acronimo'=>'gt',
            'position'=>15
        ]);
       Provincias::create([
            'nombre'=> 'Isla de la Juventud',
            'acronimo'=>'ij',
            'position'=>16
        ]);
    }
}
