<?php

use Illuminate\Database\Seeder;
use App\Models\Barrios;

class BarriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Barrios::truncate();
       Barrios::create([
            'nombre'=> 'Barrio Nuevo',
            'acronimo'=>'barrio nuevo',
            'municipios'=>'168',
            'position'=>1
        ]);
       Barrios::create([
            'nombre'=> '26 de Julio',
            'acronimo'=>'francoy',
            'municipios'=>'168',
            'position'=>2
        ]);
       Barrios::create([
            'nombre'=> 'Abel Santamaría',
            'acronimo'=>'abel santamaría',
            'municipios'=>'168',
            'position'=>3
        ]);
       Barrios::create([
            'nombre'=> 'Mirco 70',
            'acronimo'=>'micro 70',
            'municipios'=>'168',
            'position'=>4
        ]);
       Barrios::create([
            'nombre'=> 'Micro 2',
            'acronimo'=>'micro 2',
            'municipios'=>'168',
            'position'=>5
        ]);
       Barrios::create([
            'nombre'=> 'Industrial',
            'acronimo'=>'industrial',
            'municipios'=>'168',
            'position'=>6
        ]);
       Barrios::create([
            'nombre'=> 'Sierra Caballos',
            'acronimo'=>'sierra caballos',
            'municipios'=>'168',
            'position'=>7
        ]);
       Barrios::create([
            'nombre'=> 'Nasareno',
            'acronimo'=>'nasareno',
            'municipios'=>'168',
            'position'=>8
        ]);
       Barrios::create([
            'nombre'=> 'Saigón',
            'acronimo'=>'saigón',
            'municipios'=>'168',
            'position'=>9
        ]);
       Barrios::create([
            'nombre'=> 'Delio Chacón',
            'acronimo'=>'chacón',
            'municipios'=>'168',
            'position'=>10
        ]);
       Barrios::create([
            'nombre'=> 'La Fe',
            'acronimo'=>'la fe',
            'municipios'=>'168',
            'position'=>11
        ]);
       Barrios::create([
            'nombre'=> 'Panel 1',
            'acronimo'=>'panel 1',
            'municipios'=>'168',
            'position'=>12
        ]);

       Barrios::create([
            'nombre'=> 'Panel 2',
            'acronimo'=>'panel 2',
            'municipios'=>'168',
            'position'=>12
        ]);
       Barrios::create([
            'nombre'=> 'Camilo Cienfuegos',
            'acronimo'=>'camilo',
            'municipios'=>'168',
            'position'=>12
        ]);
       Barrios::create([
            'nombre'=> 'Cochabamba',
            'acronimo'=>'cocabamba',
            'municipios'=>'168',
            'position'=>12
        ]);
       Barrios::create([
            'nombre'=> 'Los Mangos',
            'acronimo'=>'los mangos',
            'municipios'=>'168',
            'position'=>12
        ]);
    }
}
