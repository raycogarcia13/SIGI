<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\EstadoCivil;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoCivil::truncate();
        EstadoCivil::create(
            [
            'nombre' => 'Soltero/a',
            'acronimo' => 'S',
            'position' => 1
            ]
        );
        EstadoCivil::create(
            [
            'nombre' => 'Casado/a',
            'acronimo' => 'C',
            'position' => 2
            ]
        );
        EstadoCivil::create(
            [
            'nombre' => 'Divorciado/a',
            'acronimo' => 'D',
            'position' => 3
            ]
        );
        EstadoCivil::create(
            [
            'nombre' => 'Viudo/a',
            'acronimo' => 'V',
            'position' => 4
            ]
        );

    }
}
