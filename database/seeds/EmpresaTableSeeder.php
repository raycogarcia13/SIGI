<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaTableSeeder extends Seeder
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::truncate();
        Empresa::create([
            'codigo'=> '1234',
            'nombre'=>'Empresa Cupet',
            'acronimo'=>'CUPET',
            'organismo'=>'No se',
            'logo'=>'KgQR9OrHq6MFhzmYzOJlyYgOjZHtOU62yray81vd.png',
            'nae'=>'nae',
            'dpa'=>'dpa',
            'reeup'=>'reeup',
            'direccion'=>'Una ahi nueva'
        ]);
    }
}
