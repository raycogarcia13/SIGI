<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\CategoriasDocentes;

class CategoriasDocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       CategoriasDocentes::truncate();
       CategoriasDocentes::create([
            'nombre'=> 'Profesor Titular',
            'acronimo'=>'Prof. Ti.',
            'position'=>1
        ]);
       CategoriasDocentes::create([
            'nombre'=> 'Profesor Auxiliar',
            'acronimo'=>'Prof. Aux.',
            'position'=>2
        ]);
       CategoriasDocentes::create([
            'nombre'=> 'Profesor Asistente',
            'acronimo'=>'Prof. Asis.',
            'position'=>3
        ]);
    }
}

/*

https://www.gacetaoficial.gob.cu/pdf/GOC-2019-O65.pdf
DECRETO-LEY No. 372 DEL SISTEMA NACIONAL DE GRADOS CIENTÍFICOS

las categorías docentes:
  Profesor Titular,
  Profesor Auxiliar,
  Profesor Asistente;


*/
