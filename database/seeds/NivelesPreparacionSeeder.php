<?php

use App\Models\Caphum\NivelesPreparacion;
use Illuminate\Database\Seeder;

class NivelesPreparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NivelesPreparacion::truncate();
        NivelesPreparacion::create([
            'nombre' => '6to grado',
            'acronimo' => 'sexto',
            'position' => 1
        ]);
        NivelesPreparacion::create([
            'nombre' => '9no grado',
            'acronimo' => 'noveno',
            'position' => 2
        ]);
        NivelesPreparacion::create([
            'nombre' => 'Obrero Calificado',
            'acronimo' => 'obrero_calificado',
            'position' => 3
        ]);
        NivelesPreparacion::create([
            'nombre' => 'Medio Superior (12 grado)',
            'acronimo' => '12_grado',
            'position' => 4
        ]);
        NivelesPreparacion::create([
            'nombre' => 'Técnico Medio',
            'acronimo' => 'tecnico_medio',
            'position' => 5
        ]);
        NivelesPreparacion::create([
            'nombre' => 'Ciclo Corto',
            'acronimo' => 'ciclo_corto',
            'position' => 6
        ]);
        NivelesPreparacion::create([
            'nombre' => 'Universitario',
            'acronimo' => 'superior',
            'position' => 7
        ]);
    }
}
