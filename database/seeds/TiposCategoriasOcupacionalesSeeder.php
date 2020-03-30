<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\TiposCategoriasOcupacionales;

class TiposCategoriasOcupacionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TiposCategoriasOcupacionales::truncate();
        TiposCategoriasOcupacionales::create(
            [
            'nombre' => 'Directivo Superior',
            'acronimo' => 'Dir. Sup',
            'position' => 1
            ]
        );
        TiposCategoriasOcupacionales::create(
            [
            'nombre' => 'Directivo',
            'acronimo' => 'Dir.',
            'position' => 2
            ]
        );
        TiposCategoriasOcupacionales::create(
            [
            'nombre' => 'Ejecutivo',
            'acronimo' => 'Eject.',
            'position' => 3
            ]
        );

    }
}
