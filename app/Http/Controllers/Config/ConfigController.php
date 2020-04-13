<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Auditoria;
use App\Models\Politicas;
use App\Models\Session;
use Laracasts\Flash\Flash;
use App\Http\Requests\PoliticasContrasenasRequest;
use App\Models\Modulo;
use App\Models\Permiso;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('menu','config.menu');
        $this->middleware(['auth','rol:config']);
        // $this->middleware('rol:config')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('empresa'));
    }

    public function getModulos()
    {
        return Modulo::select('id','nombre','mostrar')->get();
    }
   
    public function getPermisos(Request $request)
    {
        return Permiso::where('modulo_id',$request->modulo)->get();
    }

    public function accesos()
    {
        $all=Auditoria::all();
        $edit=[
            'user'=>['edit'=>false,'label'=>'Usuario'],
            'trabajador'=>['edit'=>false,'label'=>'Trabajador'],
            'fecha'=>['edit'=>false,'label'=>'Fecha'],
            'ip'=>['edit'=>false,'label'=>'IP PC'],
            'modulo'=>['edit'=>false,'label'=>'Módulo'],
            'accion'=>['edit'=>false,'label'=>'Acción']
            // 'consulta'=>['edit'=>false,'label'=>'Consulta']
        ];
        return view('config.accesos')->with([
            'table_form'=>$edit,
            'data_path' => '/config/accesosData/',
            'header'=>"Listado de accesos",
            'noCrud'=>true
        ]
        );
    }

    public function accesosData(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        // $data = MotivosBajas::all();
        $data = ($request->filtro)?
            Auditoria::orderBy('created_at','DESC')->where('created_at', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
            Auditoria::orderBy('created_at','DESC')->paginate($cantidad);
        for($i=0;$i<$data->count();$i++)
        {   $item=$data[$i];
            $data[$i]['user']=$item->usuario->username;
            $data[$i]['trabajador']=$item->persona();
            $data[$i]['fecha']=date('d/m/Y H:i',strtotime($item->created_at));
            $data[$i]['ip']=$item->ip_pc;
            $data[$i]['modulo']=$item->modulo;
            $data[$i]['accion']=$item->accion;
            $data[$i]['consulta']=substr($item->consulta,0,50)."...";
        }

        // return $all;
        return $data;

    }
 
    public function politicas()
    {
        $pol=Politicas::all()->first(); 
        $ses=Session::all()->first();
        return view('config.politicas')->with([
            'politicas'=>$pol,
            'session'=>$ses,
            ]);
    }

    public function politicasStore(PoliticasContrasenasRequest $request)
    {
        $dato = Politicas::all()->first();
        $dato->longitud_minima=$request->longitud_minima;
        $dato->intentos_fallidos=$request->intentos_fallidos;
        $dato->notif_vencimiento=$request->notif_vencimiento;
        $dato->tiempo_validez=$request->tiempo_validez;
        $dato->mayusculas=(isset($request->mayusculas)?true:false);
        $dato->numeros=(isset($request->numeros)?true:false);
        $dato->carac_especiales=(isset($request->carac_especiales)?true:false);
        
        
        $dato->save();

        $session = Session::all()->first();
        $session->inactividad=$request->inactividad;
        $session->simultaneo=(isset($request->simultaneo)?true:false);
        $session->save();
       
        $key='SESSION_LIFETIME';
        $path = base_path('.env');
        $newValue=$request->inactividad;
        $delim='';
        $oldValue = env($key);
        if ($oldValue != $newValue) {
            if (file_exists($path)) {
                file_put_contents(
                    $path, str_replace(
                        $key.'='.$delim.$oldValue.$delim, 
                        $key.'='.$delim.$newValue.$delim, 
                        file_get_contents($path)
                    )
                );
            }
        }
        $request->session()->flash('status', 'correcto');
        return redirect(route('politicas'));
    }

    public function crypt(Request $request)
    {
        $user=User::find(auth()->user()->id);
        
        if(Hash::check($request->pass,$user->password))
            return 'true';
        return 'false';
    }

    public function password(Request $request)
    {
        $user=User::find(auth()->user()->id);
        $user->password=bcrypt($request->password);
        $user->save();
        return 'true';
    }
}
