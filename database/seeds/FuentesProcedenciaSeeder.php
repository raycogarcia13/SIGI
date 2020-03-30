<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\FuentesProcedencia;

class FuentesProcedenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      FuentesProcedencia::truncate();
      FuentesProcedencia::create([
            'nombre' => 'Estudiante',
            'acronimo' => 'Est',
            'position' => 1
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Desempelado',
            'acronimo' => 'Desemp',
            'position' => 2
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Ama de casa',
            'acronimo' => 'Ama C',
            'position' => 3
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Sector no estatal',
            'acronimo' => 'SNE',
            'position' => 4
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Sector Estatal',
            'acronimo' => 'SE',
            'position' => 5
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Jubilado',
            'acronimo' => 'JUB',
            'position' => 6
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Lienciado del Servicio Militar Activo',
            'acronimo' => 'Lic SMA',
            'position' => 7
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Licenciado de las FAR',
            'acronimo' => 'Lic FAR',
            'position' => 8
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Licenciado del MININT',
            'acronimo' => 'Lic MININT',
            'position' => 9
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Centro Penitenciario',
            'acronimo' => 'CP',
            'position' => 10
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Sancionado a trab. Correccional sin Internamiento',
            'acronimo' => 'STCSI',
            'position' => 11
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Persona con Discapacidad',
            'acronimo' => 'PCD',
            'position' => 12
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Regrasa del exterior',
            'acronimo' => 'RE',
            'position' => 13
      ]);
      FuentesProcedencia::create([
            'nombre' => 'Disponible',
            'acronimo' => 'Disp',
            'position' => 14
      ]);
    }
}
