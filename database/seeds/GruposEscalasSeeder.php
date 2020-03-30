<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\GruposEscalas;

class GruposEscalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GruposEscalas::truncate();
        GruposEscalas::create([
            'nombre' => 'I',
            'salario_escala' => 225.00,
            'tarifa_horaria' => 1.18048,
            'position' => 1
        ]);
        GruposEscalas::create([
            'nombre' => 'II',
            'salario_escala' => 230.00,
            'tarifa_horaria' => 1.23294,
            'position' => 2
        ]);
        GruposEscalas::create([
            'nombre' => 'III',
            'salario_escala' => 235.00,
            'tarifa_horaria' => 1.25918,
            'position' => 3
        ]);

        GruposEscalas::create([
            'nombre' => 'IV',
            'salario_escala' => 240.00,
            'tarifa_horaria' => 1.31164,
            'position' => 4
        ]);
    }
}
