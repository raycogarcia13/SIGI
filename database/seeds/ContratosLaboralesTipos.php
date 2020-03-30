<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\ContratosLaboralesTipos;

class ContratosLaboralesTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ContratosLaboralesTipos::truncate();
       ContratosLaboralesTipos::create([
            'nombre'=> 'Sin periódo a prueba',
            'acronimo'=>'SPP',
            'position'=>1
        ]);
       ContratosLaboralesTipos::create([
            'nombre'=> 'Cumplimiento de Servicio Social',
            'acronimo'=>'CSS',
            'position'=>2
        ]);
       ContratosLaboralesTipos::create([
            'nombre'=> 'Periódo a prueba',
            'acronimo'=>'PP',
            'position'=>3
        ]);
       ContratosLaboralesTipos::create([
            'nombre'=> 'Sustituir temporalmente a trabajadores ausentes por causas justificadas amparadas en la legislación',
            'acronimo'=>'STTACJAL',
            'position'=>4
        ]);
       ContratosLaboralesTipos::create([
            'nombre'=> 'Cursos de capacitación a trabajadores de nueva incorporación',
            'acronimo'=>'CCTNL',
            'position'=>5
        ]);
       ContratosLaboralesTipos::create([
            'nombre'=> 'Otros que lo requieran',
            'acronimo'=>'OR',
            'position'=>6
        ]);
    }
}
