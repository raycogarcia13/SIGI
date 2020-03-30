<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\EspecialidadesEstudio;

class EspecialidadesEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       EspecialidadesEstudio::truncate();
       EspecialidadesEstudio::create([
            'nombre'=> 'Licenciado en Matemática',
            'acronimo'=>'Lic. Mat',
            'position'=>1
        ]);
       EspecialidadesEstudio::create([
            'nombre'=> 'Licenciado en Química',
            'acronimo'=>'Lic. Qui.',
            'position'=>2
        ]);
       EspecialidadesEstudio::create([
            'nombre'=> 'Licenciado en Farmacia y Alimento',
            'acronimo'=>'Lic. Far. y Al.',
            'position'=>3
        ]);
       EspecialidadesEstudio::create([
            'nombre'=> 'Licenciado en Física',
            'acronimo'=>'Lic. Fis.',
            'position'=>4
        ]);
       EspecialidadesEstudio::create([
            'nombre'=> 'Licenciado en Economía',
            'acronimo'=>'Lic. en Eco.',
            'position'=>5
        ]);
       EspecialidadesEstudio::create([
            'nombre'=> 'Licenciado en Contabilidad y Finanzas',
            'acronimo'=>'Lic. Cont. y Fin.',
            'position'=>6
        ]);
    }
}
