<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\UbicacionDefensa;


class UbicacionDefensaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       UbicacionDefensa::truncate();
       UbicacionDefensa::create([
            'nombre'=> 'Milicias de Tropas Territoriales',
            'acronimo'=>'MTT',
            'position'=>1
        ]);
       UbicacionDefensa::create([
            'nombre'=> 'Brigada de Producción y Defensa',
            'acronimo'=>'BDP/LR',
            'position'=>2
        ]);
       UbicacionDefensa::create([
            'nombre'=> 'Unidad Militar',
            'acronimo'=>'UM',
            'position'=>3
        ]);
       UbicacionDefensa::create([
            'nombre'=> 'Plantilla para Tiempo de Guerra',
            'acronimo'=>'PTG/CT',
            'position'=>4
        ]);
       UbicacionDefensa::create([
            'nombre'=> 'No incorporado',
            'acronimo'=>'No. Incorp.',
            'position'=>5
        ]);
    }
}
