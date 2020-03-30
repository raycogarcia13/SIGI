<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Models\Invitado;

class UsersTableConfigUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        User::truncate();
        Invitado::truncate();
        $inv=Invitado::create([
            'nombre'=>'Rayco',
            'primer_apellido'=>'Garcia',
            'segundo_apellido'=>'Fernandez',
            'ci'=>'90082042682',
            'entidad'=>'ENPA',
            'cargo'=>'geomatico',
            'comentario'=>'desarrollo de aplicacion'
        ]);

        User::create(['position'=>1,'username'=> 'root','password'=>bcrypt('kronosk13'),'is_trabajador'=>false,'activo'=>true,'invitado_id'=>$inv->id]);

        $inv2=Invitado::create([
            'nombre'=>'Usuario',
            'primer_apellido'=>'Pedro',
            'segundo_apellido'=>'Perez',
            'ci'=>'8558558585',
            'entidad'=>'HOME',
            'cargo'=>'titular',
            'comentario'=>'Usuario Normal de la aplicacion'
        ]);

        User::create(['position'=>2,'username'=> 'usuario','password'=>bcrypt('usuario'),'is_trabajador'=>false,'activo'=>true,'invitado_id'=>$inv2->id]);
    }
}
