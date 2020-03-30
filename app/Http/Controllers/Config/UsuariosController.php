<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\User;
use App\Models\Trabajador;
use App\Models\Politicas;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Invitado;
use Laracasts\Flash\Flash;
use App\Http\Requests\UsuarioEditRequest;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    //
    public function __construct()
    {
        View::share('menu','config.menu');
        $this->middleware(['auth','rol:config']);
        // $this->middleware('rol:config')->only('index');
    }

    public function index()
    {
        $politicas=Politicas::all()->first();
        $edit=[
            'position'=>['edit'=>false,'label'=>'#'],
            'nombre'=>['edit'=>false,'label'=>'Nombre'],
            'username'=>['edit'=>true,'label'=>'Usuario','rules'=>'required','type'=>'text'],
            'ci'=>['edit'=>false,'label'=>'CI'],
            'created_at'=>['edit'=>false,'label'=>'Creado en :','type'=>'date']
        ];
        return view('config.usuarios.listado')->with([
            'delete_path'=>'/config/usuarios',
            'update_path' => '/config/usuarios',
            'data_path' => '/config/getUsuarios',
            'store'=>'/config/usuario/store',
            'politicas'=>$politicas,
            'table_form'=>$edit,
            'header'=>'Usuarios',
            'reactivar'=>'/config/usuario/reactivar'
            ]);
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        $estado = isset($request->estado)?$request->estado:1;
        if($estado==1)
        $usuarios = ($request->filtro)?
                User::orderBy('position','ASC')->where('username', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                User::orderBy('position','ASC')->paginate($cantidad);
        else
        $usuarios = ($request->filtro)?
                    User::orderBy('deleted_at','ASC')->where('username', 'LIKE', '%' . $request->filtro . '%')->onlyTrashed()->paginate($cantidad):
                    User::orderBy('deleted_at','ASC')->onlyTrashed()->paginate($cantidad);

        for($i=0;$i<$usuarios->count();$i++)
            {
                $usuarios[$i]['ci']=$usuarios[$i]->getCi();
                $usuarios[$i]['nombre']=$usuarios[$i]->getNombre();
            }
        return $usuarios;
    }

    public function personas($tipo)
    {
        $todos=[];
        if($tipo=='invitado')
        {
            $all=Invitado::all();
            foreach($all as $item)
            {
                if(!User::where('invitado_id',$item->id)->withTrashed()->get()->count()>0)
                    $todos[]=['nombre'=>$item->nombre." ".$item->primer_apellido." ".$item->segundo_apellido ,'id'=>$item->id];
            }                
        }
        else
        {
            $all=Trabajador::all();
            foreach($all as $item)
            {
                if(!User::where('trabajador_id',$item->id)->withTrashed()->get()->count()>0)
                    $todos[]=['nombre'=>$item->nombre." ".$item->primer_apellido." ".$item->segundo_apellido ,'id'=>$item->id];
            }
        }
        return collect($todos);
    }

    public function store(Request $request)
    {
        $username=$request->username;
        if(User::where('username',$username)->count()>0)
            return ['success'=>'failed'];
        $password=$request->password;
        $is_trabajador=($request->persona_tipo=="trabajador")?true:false;
        $last=User::orderBy('position','DESC')->get()->first();
        $position=$last->position+1;
        $usuario=User::create([
            'username'=>$username,
            'position'=>$last->position+1,
            'password'=>bcrypt($password),
            'is_trabajador'=>$is_trabajador,
            'activo'=>true
        ]);
        if($is_trabajador)
            $usuario->trabajador_id=$request->persona_id;
        else
            $usuario->invitado_id=$request->persona_id;
        $usuario->save();
        return ['success'=>true];
    }
    
    public function update(Request $request, $id)
    {
        $data=User::find($id);
        $data->username=$request->username;
        $data->save();
        return ['success'=>true,'message'=>'Edición satisfactoria'];
    }


    public function destroy($id,Request $request)
    {
        $all= $request->ids;
        $deletes=[];
        $disabled=[];
        foreach($all as $item)
        {
            $d=User::find($item);
            $this->fixDeletes('config_usuario',$d->position);
            if($d->isUsed())
            {
                $disabled[]=$d;
                $d->delete();
            }
            else{
                $deletes[]=$d;
                $d->forceDelete();
            }

        }
        
        return ['deletes'=>$deletes,'disabled'=>$disabled];
    }

    public function fixDeletes($tabla,$delPos)
    {
        $count=DB::table($tabla)->get()->count();
        $actual=$delPos;
        if($actual!=$count)
        {
            for($j=$actual+1;$j<=$count;$j++)
            DB::table($tabla)->where('position',$j)->decrement('position',1);
        }
    }

    public function reactivar(Request $request)
    {
        foreach($request->ids as $id)
        {
            $last=User::orderBy('position','DESC')->get()->first();
            $position=$last->position+1;
            User::where('id',$id)->restore();
            User::where('id',$id)->update(['position'=>$position]);
        }

        return ['success'=>true];
    }
}
