<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caphum\GruposEscalas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class GruposEscalaController extends Controller
{
        /*
    Fuentes Procedencia Class
    */
    public function __construct()
    {
        View::share('menu','caphum.menu');
        $this->middleware(['auth','rol:caphum'] );
        // $this->middleware('rol:config')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edit=[
            'position'=>['edit'=>false,'label'=>'#'],
            'nombre'=>['edit'=>true,'label'=>'Nombre','rules'=>'data-validate-length-range="6"','type'=>'text'],
            'salario_escala'=>['edit'=>true,'label'=>'Saralio Escala','rules'=>'required','type'=>'number'],
            'tarifa_horaria'=>['edit'=>true,'label'=>'Tarifa Horaria','rules'=>'required','type'=>'number'],
        ];
        $new=[
            'nombre'=>['placeholder'=>'Nombre','label'=>'Nombre','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'salario_escala'=>['placeholder'=>'Sario Escala','label'=>'Salario Escala','rules'=>'required','type'=>'salario_escala','id'=>"salario_escala"],
            'tarifa_horaria'=>['placeholder'=>'Tarifa Horaria','label'=>'Tarifa Horaria','rules'=>'required','type'=>'tarifa_horaria','id'=>'tarifa_horaria']
        ];
        return view('crud.listado')->with([
            'base_title'=>'CapHum | Grupos de Escala',
            'header'=>'Grupos de Escala',
            'base_icono'=>'images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg',
            'delete_path'=>'/caphum/gruposEscala',
            'update_path' => '/caphum/gruposEscala',
            'data_path' => '/caphum/getGruposEscala',
            'store'=>'/caphum/gruposEscala',
            'table_form'=>$edit,
            'create_form'=>$new,
            'table'=>'caphum_grupos_escalas',
            'reactivar'=>'/caphum/gruposescala/reactivar',
            ]);
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        $estado = isset($request->estado)?$request->estado:1;
        // $data = GruposEscalas::all();
        if($estado==1)
            $data = ($request->filtro)?
                    GruposEscalas::orderBy('position','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                    GruposEscalas::orderBy('position','ASC')->paginate($cantidad);
        else
        $data = ($request->filtro)?
                    GruposEscalas::orderBy('deleted_at','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->onlyTrashed()->paginate($cantidad):
                    GruposEscalas::orderBy('deleted_at','ASC')->onlyTrashed()->paginate($cantidad);

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(GruposEscalas::where('nombre',$request->nombre)->count()>0 ||GruposEscalas::where('salario_escala',$request->salario_escala)->count()>0 ||GruposEscalas::where('tarifa_horaria',$request->tarifa_horaria)->count()>0)
            return ['success'=>'failed'];

        $last=GruposEscalas::orderBy('position','DESC')->get()->first();
        $position=$last->position+1;
        GruposEscalas::create([
            'nombre'=> $request->nombre,
            'salario_escala'=>$request->salario_escala,
            'tarifa_horaria'=>$request->tarifa_horaria,
            'position'=>$last->position+1
        ]);
        return ['success'=>true];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=GruposEscalas::find($id);
        $data->nombre=$request->nombre;
        $data->salario_escala=$request->salario_escala;
        $data->tarifa_horaria=$request->tarifa_horaria;
        $data->save();
        return ['success'=>true,'message'=>'Edición satisfactoria'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $all= $request->ids;
        $deletes=[];
        $disabled=[];
        foreach($all as $item)
        {
            $d=GruposEscalas::find($item);
            $this->fixDeletes('caphum_grupos_escalas',$d->position);
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
            $last=GruposEscalas::orderBy('position','DESC')->get()->first();
            $position=$last->position+1;
            GruposEscalas::where('id',$id)->restore();
            GruposEscalas::where('id',$id)->update(['position'=>$position]);
        }

        return ['success'=>true];
    }
}
