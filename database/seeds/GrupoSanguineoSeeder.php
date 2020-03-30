<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\GrupoSanguineo;

class GrupoSanguineoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       GrupoSanguineo::truncate();
       GrupoSanguineo::create([
            'nombre'=> 'O-',
            'acronimo'=>'O-',
            'position'=>1
        ]);
       GrupoSanguineo::create([
            'nombre'=> 'O+',
            'acronimo'=>'O+',
            'position'=>2
        ]);
       GrupoSanguineo::create([
            'nombre'=> 'A+',
            'acronimo'=>'A+',
            'position'=>3
        ]);
       GrupoSanguineo::create([
            'nombre'=> 'A+',
            'acronimo'=>'A+',
            'position'=>4
        ]);
       GrupoSanguineo::create([
            'nombre'=> 'B+',
            'acronimo'=>'B+',
            'position'=>5
        ]);
       GrupoSanguineo::create([
            'nombre'=> 'B+',
            'acronimo'=>'G+',
            'position'=>6
        ]);
       GrupoSanguineo::create([
            'nombre'=> 'AB+',
            'acronimo'=>'AB+',
            'position'=>7
        ]);
       GrupoSanguineo::create([
            'nombre'=> 'AB+',
            'acronimo'=>'AB+',
            'position'=>8
        ]);
    }
}
