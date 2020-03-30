<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\CategoriasOcupacionales;

class CategoriasOcupacionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriasOcupacionales::truncate();
        CategoriasOcupacionales::create(
            [
            'nombre' => 'Operario',
            'acronimo' => 'O',
            'tipo' => '---',
            'position' => 1
            ]
        );
        CategoriasOcupacionales::create(
            [
            'nombre' => 'Servicio',
            'acronimo' => 'S',
            'tipo' => '---',
            'position' => 2
            ]
        );
        CategoriasOcupacionales::create(
            [
            'nombre' => 'Administrativo',
            'acronimo' => 'A',
            'tipo' => '---',
            'position' => 3
            ]
        );
        CategoriasOcupacionales::create(
            [
            'nombre' => 'Técnico',
            'acronimo' => 'T',
            'tipo' => '---',
            'position' => 4
            ]
        );
        CategoriasOcupacionales::create(
            [
            'nombre' => 'Cuadro',
            'acronimo' => 'C',
            'tipo' => 'Directivo Superior, Directivo, Ejecutivo',
            'position' => 5
            ]
        );

    }
}
