<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\TallaGorra;

class TallaGorraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TallaGorra::truncate();
       TallaGorra::create([
            'nombre'=> '10',
            'acronimo'=>'10',
            'position'=>1
        ]);
       TallaGorra::create([
            'nombre'=> '11',
            'acronimo'=>'11',
            'position'=>2
        ]);
       TallaGorra::create([
            'nombre'=> '13',
            'acronimo'=>'13',
            'position'=>3
        ]);
       TallaGorra::create([
            'nombre'=> '14',
            'acronimo'=>'14',
            'position'=>4
        ]);
       TallaGorra::create([
            'nombre'=> '15',
            'acronimo'=>'15',
            'position'=>5
        ]);
    }
}
