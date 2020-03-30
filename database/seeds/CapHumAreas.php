<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Areas;

class CapHumAreas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Areas::truncate();
        Areas::create([
            'nombre'=> 'Dirección General',
            'tipo_area'=>'Dirección'
        ]);
    }
}
