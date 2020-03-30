<?php

use Illuminate\Database\Seeder;
use App\Models\Caphum\Talla_persona_vestuario_presencia;

class TallaPersonaVestuarioPresenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Talla_persona_vestuario_presencia::truncate();
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>1
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>1

        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>2
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>2
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>3
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>3
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>4
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>4
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>5
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>5
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>6
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>6
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>7
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>7
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>8
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>8
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>9
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>9
        ]);
       Talla_persona_vestuario_presencia::create([
            // 'persona_id'=>10
            'talla_id'=>1,
            'prenda_id'=>1,
            'position'=>10
        ]);
    }
}
