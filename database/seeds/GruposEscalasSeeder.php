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
            ### ### 'tipo_entidad_id' => 1,
            'nombre' => 'I',
            'salario_escala' => 225.00,
            'tarifa_horaria' => 1.00,
            'position' => 1
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'II',
            'salario_escala' => 235.00,
            'tarifa_horaria' => 1.04,
            'position' => 2
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'III',
            'salario_escala' => 240.00,
            'tarifa_horaria' => 1.07,
            'position' => 3
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'VI',
            'salario_escala' => 250.00,
            'tarifa_horaria' => 1.12,
            'position' => 4
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'V',
            'salario_escala' => 255.00,
            'tarifa_horaria' => 1.14,
            'position' => 5
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'VI',
            'salario_escala' => 260.00,
            'tarifa_horaria' => 1.16,
            'position' => 6
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'VII',
            'salario_escala' => 275.00,
            'tarifa_horaria' => 1.23,
            'position' => 7
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'VIII',
            'tarifa_horaria' => 1.27,
            'salario_escala' => 285.00,
            'position' => 8
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'IX',
            'tarifa_horaria' => 1.41,
            'salario_escala' => 315.00,
            'position' => 9
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'X',
            'tarifa_horaria' => 1.44,
            'salario_escala' => 325.00,
            'position' => 10
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XI',
            'tarifa_horaria' => 1.63,
            'salario_escala' => 365.00,
            'position' => 11
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XII',
            'tarifa_horaria' => 1.72,
            'salario_escala' => 385.00,
            'position' => 12
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XIII',
            'tarifa_horaria' => 1.77,
            'salario_escala' => 400.00,
            'position' => 13
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XIV',
            'tarifa_horaria' => 1.90,
            'salario_escala' => 425.00,
            'position' => 14
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XV',
            'tarifa_horaria' => 1.96,
            'salario_escala' => 440.00,
            'position' => 15
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XVI',
            'tarifa_horaria' => 2.02,
            'salario_escala' => 455.00,
            'position' => 16
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XVII',
            'tarifa_horaria' => 2.11,
            'salario_escala' => 475.00,
            'position' => 17
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XVIII',
            'tarifa_horaria' => 2.22,
            'salario_escala' => 500.00,
            'position' => 18
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XIX',
            'tarifa_horaria' => 2.33,
            'salario_escala' => 525.00,
            'position' => 19
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XX',
            'tarifa_horaria' => 2.44,
            'salario_escala' => 550.00,
            'position' => 20
        ]);

        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XXI',
            'tarifa_horaria' => 2.67,
            'salario_escala' => 600.00,
            'position' => 21
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 1,
            'nombre' => 'XXII',
            'tarifa_horaria' => 2.89,
            'salario_escala' => 650.00,
            'position' => 22
        ]);
        /*
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'I',
            'tarifa_horaria' => 1.00,
            'salario_escala' => 400.00,
            'position' => 23
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'II',
            'tarifa_horaria' => 1.05,
            'salario_escala' => 420.00,
            'position' => 24
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'III',
            'tarifa_horaria' => 1.13,
            'salario_escala' => 450.00,
            'position' => 25
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'IV',
            'tarifa_horaria' => 1.20,
            'salario_escala' => 480.00,
            'position' => 26
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'V',
            'tarifa_horaria' => 1.28,
            'salario_escala' => 510.00,
            'position' => 27
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'VI',
            'tarifa_horaria' => 1.35,
            'salario_escala' => 540.00,
            'position' => 28
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'VII',
            'tarifa_horaria' => 1.45,
            'salario_escala' => 580.00,
            'position' => 29
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'VIII',
            'tarifa_horaria' => 1.55,
            'salario_escala' => 620.00,
            'position' => 30
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'IX',
            'tarifa_horaria' => 1.68,
            'salario_escala' => 670.00,
            'position' => 31
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'X',
            'tarifa_horaria' => 1.80,
            'salario_escala' => 720.00,
            'position' => 32
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XI',
            'tarifa_horaria' => 1.98,
            'salario_escala' => 790.00,
            'position' => 33
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XII',
            'tarifa_horaria' => 2.16,
            'salario_escala' => 865.00,
            'position' => 34
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XIII',
            'tarifa_horaria' => 2.36,
            'salario_escala' => 945.00,
            'position' => 35
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XIV',
            'tarifa_horaria' => 2.58,
            'salario_escala' => 1030.00,
            'position' => 36
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XV',
            'tarifa_horaria' => 2.80,
            'salario_escala' => 1120.00,
            'position' => 37
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XVI',
            'tarifa_horaria' => 3.05,
            'salario_escala' => 1220.00,
            'position' => 38
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XVII',
            'tarifa_horaria' => 3.30,
            'salario_escala' => 1320.00,
            'position' => 39
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XVIII',
            'tarifa_horaria' => 3.56,
            'salario_escala' => 1425.00,
            'position' => 40
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XIX',
            'tarifa_horaria' => 3.83,
            'salario_escala' => 1530.00,
            'position' => 41
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XX',
            'tarifa_horaria' => 4.09,
            'salario_escala' => 1635.00,
            'position' => 42
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXI',
            'tarifa_horaria' => 4.35,
            'salario_escala' => 1740.00,
            'position' => 43
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXII',
            'tarifa_horaria' => 4.63,
            'salario_escala' => 1850.00,
            'position' => 44
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXIII',
            'tarifa_horaria' => 4.90,
            'salario_escala' => 1960.00,
            'position' => 45
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXIV',
            'tarifa_horaria' => 5.18,
            'salario_escala' => 2070.00,
            'position' => 46
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXV',
            'tarifa_horaria' => 5.45,
            'salario_escala' => 2180.00,
            'position' => 47
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXVI',
            'tarifa_horaria' => 5.73,
            'salario_escala' => 2290.00,
            'position' => 48
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXVII',
            'tarifa_horaria' => 6.00,
            'salario_escala' => 2400.00,
            'position' => 49
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXVIII',
            'tarifa_horaria' => 6.29,
            'salario_escala' => 2515.00,
            'position' => 50
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXIX',
            'tarifa_horaria' => 6.58,
            'salario_escala' => 2630.00,
            'position' => 51
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXX',
            'tarifa_horaria' => 6.88,
            'salario_escala' => 2750.00,
            'position' => 52
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXXI',
            'tarifa_horaria' => 7.18,
            'salario_escala' => 2870.00,
            'position' => 53
        ]);
        GruposEscalas::create([
            ### 'tipo_entidad_id' => 2,
            'nombre' => 'XXXII',
            'tarifa_horaria' => 7.50,
            'salario_escala' => 3000.00,
            'position' => 54
        ]);
        */
    }
}
