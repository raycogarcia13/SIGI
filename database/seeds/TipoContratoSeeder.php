<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\TipoContrato;

class TipoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TipoContrato::truncate();
       TipoContrato::create([
            'nombre'=> 'Por tiempo Indeterminado',
            'acronimo'=>'PTI',
            'position'=>1
        ]);
       TipoContrato::create([
            'nombre'=> 'Por tiempo Determinado o para la ejecución de trabajo u obra',
            'acronimo'=>'PTD',
            'position'=>2
        ]);
    }
}
