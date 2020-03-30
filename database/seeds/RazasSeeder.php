<?php

use App\Models\Caphum\Razas;
use Illuminate\Database\Seeder;

class RazasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Razas::truncate();
       Razas::create([
            'nombre'=> 'Blanca',
            'acronimo'=>'B',
            'position'=>1
        ]);
       Razas::create([
            'nombre'=> 'Negra',
            'acronimo'=>'N',
            'position'=>2
        ]);
       Razas::create([
            'nombre'=> 'Mestiza',
            'acronimo'=>'M',
            'position'=>3
        ]);
    }
}
