<?php

use App\Models\Caphum\MotivosBajas;
use Illuminate\Database\Seeder;

class MotivosBajasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivosBajas::truncate();
        MotivosBajas::create([
            'nombre'=> 'Salarial',
            'acronimo'=>'Sal',
            'position'=>1
        ]);
        MotivosBajas::create([
            'nombre'=> 'Jubilación',
            'acronimo'=>'Jub',
            'position'=>2
        ]);
        MotivosBajas::create([
            'nombre'=> 'Fallecimiento',
            'acronimo'=>'Fall',
            'position'=>3
        ]);
        MotivosBajas::create([
            'nombre'=> 'Invalidez total',
            'acronimo'=>'Inval total',
            'position'=>4
        ]);
        MotivosBajas::create([
            'nombre'=> 'Invalidez parcial',
            'acronimo'=>'Inval parcial',
            'position'=>5
        ]);
        MotivosBajas::create([
            'nombre'=> 'Privación de libertad',
            'acronimo'=>'Privac de libertad',
            'position'=>6
        ]);
        MotivosBajas::create([
            'nombre'=> 'Pasó a formas no estatales',
            'acronimo'=>'Pasó a FNE',
            'position'=>7
        ]);
        MotivosBajas::create([
            'nombre'=> 'Proceso de disponibilidad',
            'acronimo'=>'Proc. de disp.',
            'position'=>8
        ]);
        MotivosBajas::create([
            'nombre'=> 'Sanción administrativa',
            'acronimo'=>'Sanción admin.',
            'position'=>9
        ]);
        MotivosBajas::create([
            'nombre'=> 'Salida del país',
            'acronimo'=>'Salida del país',
            'position'=>10
        ]);
        MotivosBajas::create([
            'nombre'=> 'Otras',
            'acronimo'=>'Otras',
            'position'=>11
        ]);
    }
}
