<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Sexo;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Sexo::truncate();
       Sexo::create([
            'nombre'=> 'Masculino',
            'acronimo'=>'M',
            'position'=>1
        ]);
       Sexo::create([
            'nombre'=> 'Femenino',
            'acronimo'=>'F',
            'position'=>2
        ]);
    }
}
