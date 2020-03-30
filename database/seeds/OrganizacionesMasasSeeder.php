<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\OrganizacionesMasas;

class OrganizacionesMasasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       OrganizacionesMasas::truncate();
       OrganizacionesMasas::create([
            'nombre'=> 'PCC',
            'acronimo'=>'PCC',
            'position'=>1
        ]);
       OrganizacionesMasas::create([
            'nombre'=> 'UJC',
            'acronimo'=>'UJC',
            'position'=>2
        ]);
       OrganizacionesMasas::create([
            'nombre'=> 'CTC',
            'acronimo'=>'CTC',
            'position'=>3
        ]);
       OrganizacionesMasas::create([
            'nombre'=> 'FMC',
            'acronimo'=>'FMC',
            'position'=>4
        ]);
       OrganizacionesMasas::create([
            'nombre'=> 'FMC',
            'acronimo'=>'FMC',
            'position'=>5
        ]);
       OrganizacionesMasas::create([
            'nombre'=> 'CDR',
            'acronimo'=>'CDR',
            'position'=>6
        ]);
    }
}
