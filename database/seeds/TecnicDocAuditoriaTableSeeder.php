<?php

use Illuminate\Database\Seeder;
use App\Models\TecnicDocAuditoria;
use Illuminate\Support\Str;

class TecnicDocAuditoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TecnicDocAuditoria::truncate();

        $texto = "Lorem ipsum dolor sit amet consectetur adipiscing elit, gravida hac porttitor primis viverra bibendum suscipit, posuere nascetur dapibus dis cursus facilisi. Parturient placerat lectus semper dictum commodo dictumst non, habitant eu mattis facilisis nibh nascetur, hendrerit gravida sodales suspendisse neque mauris. Dictum purus mattis ultrices viverra vulputate nisi consequat, risus feugiat ante tristique scelerisque sapien dignissim libero, aliquam sollicitudin orci fermentum sociis varius.

        Habitasse ultrices auctor cubilia sapien nisi taciti bibendum ornare, aliquam imperdiet diam lacus a penatibus turpis cras semper, vulputate urna euismod eleifend magnis enim vestibulum nam, est litora dignissim metus morbi dictumst justo. Velit primis etiam porttitor sem netus montes blandit per magna convallis luctus, hac vitae mus quisque aenean ultrices condimentum integer curabitur ut id, congue himenaeos cubilia libero nulla mi inceptos lacus fusce vestibulum. Sollicitudin quisque nisi varius est massa auctor mattis semper praesent aenean, himenaeos pulvinar cursus cubilia accumsan natoque suscipit sagittis ad justo, sociosqu mollis feugiat bibendum donec mus odio gravida ultricies. Ultrices quisque facilisis vivamus dictum consequat semper, dignissim turpis etiam est ante sed inceptos, metus posuere urna cursus phasellus.";

        
            for ($i=0; $i < 10; $i++) { 
                TecnicDocAuditoria::create([
                    //'objetivos' => "{$value}",
                    'objetivos' => Str::words($texto, rand(20, 50)),
                    'proceso_id' => rand(1, 6),
                    'actividad_id' => rand(1, 4),
                    'id_persona' => '1',
                    'resultados' => Str::words($texto, rand(20, 50)),
                    'registrar' => rand(0, 1)
                ]);
            }
    }
}
