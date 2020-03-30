<?php

use App\Models\Permiso;
use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::truncate();
        // Modulo configuracion
        Permiso::create([
            'nombre'=> 'config',
            'mostrar'=>'Acceso a la configuración del sitio',
            'modulo_id'=>1
        ]);
        Permiso::create([
            'nombre'=> 'empresa',
            'mostrar'=>'Gestionar datos de la Empresa',
            'modulo_id'=>1
        ]);
        Permiso::create([
            'nombre'=> 'usuarios',
            'mostrar'=>'Gestionar Usuarios',
            'modulo_id'=>1
        ]);
        Permiso::create([
            'nombre'=> 'accesos',
            'mostrar'=>'Acceso a la Auditoría',
            'modulo_id'=>1
        ]);
        Permiso::create([
            'nombre'=> 'passwords',
            'mostrar'=>'Gestionar Políticas de las contraseñas',
            'modulo_id'=>1
        ]);
        Permiso::create([
            'nombre'=> 'sesion',
            'mostrar'=>'Gestionar inicios de sesión',
            'modulo_id'=>1
        ]);
        //Modulo contable
            Permiso::create([
                'nombre'=> 'aspectos',
                'mostrar'=>'Gestionar Aspectos',
                'modulo_id'=>2
            ]);
            Permiso::create([
                'nombre'=> 'conceptos',
                'mostrar'=>'Gestionar conceptos de los aspectos',
                'modulo_id'=>2
            ]);
            Permiso::create([
                'nombre'=> 'cierrecontable',
                'mostrar'=>'Cerrar Período contable',
                'modulo_id'=>2
            ]);
            Permiso::create([
                'nombre'=> 'perprocesa',
                'mostrar'=>'Retornar Período de Procesamiento',
                'modulo_id'=>2
            ]);
            Permiso::create([
                'nombre'=> 'plananual',
                'mostrar'=>'Gestionar Plan Anual de los conceptos',
                'modulo_id'=>2
            ]);
            Permiso::create([
                'nombre'=> 'planmensual',
                'mostrar'=>'Gestionar Plan Mensual de los conceptos',
                'modulo_id'=>2
            ]);
            Permiso::create([
                'nombre'=> 'realconc',
                'mostrar'=>'Gestionar Real de los conceptos',
                'modulo_id'=>2
            ]);
            // modulo capitsal humano
                Permiso::create([
                    'nombre'=> 'rrhh',
                    'mostrar'=>'Gestionar toda la información de RRHH',
                    'modulo_id'=>3
                ]);
                Permiso::create([
                    'nombre'=> 'promtraba',
                    'mostrar'=>'Gestionar promedio de trabajadores',
                    'modulo_id'=>3
                ]);
                Permiso::create([
                    'nombre'=> 'addtrabajador',
                    'mostrar'=>'Adicionar trabajadores a las plantillas de cargo',
                    'modulo_id'=>3
                ]);
                Permiso::create([
                    'nombre'=> 'reportesrrhh',
                    'mostrar'=>'Acceder a los reportes de RRHH',
                    'modulo_id'=>3
                ]);
                Permiso::create([
                    'nombre'=> 'capacitacion',
                    'mostrar'=>'Gestionar capacitación',
                    'modulo_id'=>3
                ]);
    }
}
