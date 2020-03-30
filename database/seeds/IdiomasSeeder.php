<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Idiomas;

class IdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Idiomas::truncate();
       Idiomas::create([
            'nombre'=> 'Español',
            'acronimo'=>'es',
            'position'=>1
        ]);
       Idiomas::create([
            'nombre'=> 'Inglés',
            'acronimo'=>'en',
            'position'=>2
        ]);
       Idiomas::create([
            'nombre'=> 'Portugués',
            'acronimo'=>'pg',
            'position'=>3
        ]);
       Idiomas::create([
            'nombre'=> 'Francés',
            'acronimo'=>'fr',
            'position'=>4
        ]);
       Idiomas::create([
            'nombre'=> 'Alemán',
            'acronimo'=>'gr',
            'position'=>5
        ]);
       Idiomas::create([
            'nombre'=> 'Ruso',
            'acronimo'=>'ru',
            'position'=>6
        ]);

       Idiomas::create([
            'nombre'=> 'Italiano',
            'acronimo'=>'id',
            'position'=>7
        ]);
       Idiomas::create([
            'nombre'=> 'Griego',
            'acronimo'=>'gr',
            'position'=>8
        ]);
       Idiomas::create([
            'nombre'=> 'Danés',
            'acronimo'=>'da',
            'position'=>9
        ]);
       Idiomas::create([
            'nombre'=> 'Croata',
            'acronimo'=>'co',
            'position'=>10
        ]);
       Idiomas::create([
            'nombre'=> 'Polaco',
            'acronimo'=>'po',
            'position'=>11
        ]);
       Idiomas::create([
            'nombre'=> 'Checo',
            'acronimo'=>'ch',
            'position'=>12
        ]);
       Idiomas::create([
            'nombre'=> 'Árabe',
            'acronimo'=>'ar',
            'position'=>13
        ]);
       Idiomas::create([
            'nombre'=> 'Turco',
            'acronimo'=>'tu',
            'position'=>14
        ]);
       Idiomas::create([
            'nombre'=> 'Corano',
            'acronimo'=>'co',
            'position'=>15
        ]);
       Idiomas::create([
            'nombre'=> 'Japonés',
            'acronimo'=>'ja',
            'position'=>16
        ]);
    }
}
