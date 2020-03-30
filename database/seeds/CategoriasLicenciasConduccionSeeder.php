<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\CategoriasLicenciasConduccion;

class CategoriasLicenciasConduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       CategoriasLicenciasConduccion::truncate();
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Ciclomotor',
            'acronimo'=>'A-1',
            'position'=>1,
            'especificacion'=>''
        ]);
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Motocicleta',
            'acronimo'=>'A',
            'position'=>2,
            'especificacion'=>''
        ]);
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Automóvil',
            'acronimo'=>'B',
            'position'=>3,
            'especificacion'=>'Hasta 3500 Kg'
        ]);
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Camión',
            'acronimo'=>'C-1',
            'position'=>4,
            'especificacion'=>'Hasta 7500 Kg'
        ]);
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Camión',
            'acronimo'=>'C',
            'position'=>5,
            'especificacion'=>'Mas de 7500 Kg'
        ]);

       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Microbús',
            'acronimo'=>'D-1',
            'position'=>6,
            'especificacion'=>'Hasta 17 asientos'
        ]);
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Ómnibus',
            'acronimo'=>'D',
            'position'=>7,
            'especificacion'=>'Más de 17 asientos'
        ]);
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Articulado',
            'acronimo'=>'E',
            'position'=>8,
            'especificacion'=>''
        ]);
       CategoriasLicenciasConduccion::create([
            'nombre'=> 'Agroindustrial y de la construcción',
            'acronimo'=>'F',
            'position'=>9,
            'especificacion'=>''
        ]);
    }
}
