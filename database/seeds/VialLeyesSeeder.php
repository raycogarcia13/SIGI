<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\VialLeyes;

class VialLeyesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       VialLeyes::truncate();
       VialLeyes::create([
            'nombre'=> 'Ley 60',
            'acronimo'=>'60',
            'position'=>1,
            'activa'=>0
        ]);
       VialLeyes::create([
            'nombre'=> 'Ley 109',
            'acronimo'=>'109',
            'position'=>2,
            'activa'=>1
        ]);
    }
}
