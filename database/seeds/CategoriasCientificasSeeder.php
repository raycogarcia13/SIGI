<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\CategoriasCientificas;

class CategoriasCientificasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       CategoriasCientificas::truncate();
       CategoriasCientificas::create([
            'nombre'=> 'Doctor en determinada área del conocimiento',
            'acronimo'=>'Dr. C',
            'position'=>1
        ]);
       CategoriasCientificas::create([
            'nombre'=> 'Doctor en Ciencias',
            'acronimo'=>'Dr. Cs.',
            'position'=>2
        ]);
    }
}

/*

https://www.gacetaoficial.gob.cu/pdf/GOC-2019-O65.pdf
DECRETO-LEY No. 372 DEL SISTEMA NACIONAL DE GRADOS CIENTÍFICOS

Artículo 4.1. Los grados científicos son:
a) Doctor en determinada área del conocimiento; y
b) Doctor en Ciencias.

Artículo 8. Los atributos para la firma de los profesionales con grados científicos son los siguientes:a)Doctor en determinada área del conocimiento:
a) Dr. C.; y
b) Doctor en Ciencias: Dr. Cs.


*/
