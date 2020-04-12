<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caphum\Sexo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;


class SexoController extends Controller
{
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
            'acronimo'=>['edit'=>true,'label'=>'Abreviatura','rules'=>'required','type'=>'text']
        ];
        $new=[
            'nombre'=>['placeholder'=>'Nombre','label'=>'Nombre','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'acronimo'=>['placeholder'=>'Abreviatura','label'=>'Acrónimo','rules'=>'required|parent=nombreM','type'=>'acronimo','id'=>"acronimo"],
        ];
        return view('crud.listado')->with([
            'base_title'=>'CapHum | Sexo',
            'header'=>'Sexo',
            'base_icono'=>'images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg',
            'delete_path'=>'/caphum/sexo',
            'update_path' => '/caphum/sexo',
            'data_path' => '/caphum/getSexo',
            'store'=>'/caphum/sexo',
            'table_form'=>$edit,
            'create_form'=>$new,
            'table'=>'caphum_sexo',
            'reactivar'=>'/caphum/sexos/reactivar'
            ]);
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        $estado = isset($request->estado)?$request->estado:1;
        // $data = Sexo::all();
        if($estado==1)
            $data = ($request->filtro)?
                    Sexo::orderBy('position','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                    Sexo::orderBy('position','ASC')->paginate($cantidad);
        else
        $data = ($request->filtro)?
                    Sexo::orderBy('deleted_at','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->onlyTrashed()->paginate($cantidad):
                    Sexo::orderBy('deleted_at','ASC')->onlyTrashed()->paginate($cantidad);

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
        if(Sexo::where('nombre',$request->nombre)->count()>0 ||Sexo::where('acronimo',$request->acronimo)->count()>0)
            return ['success'=>'failed'];

        $last=Sexo::orderBy('position','DESC')->get()->first();
        $position=$last->position+1;
        Sexo::create([
            'nombre'=> $request->nombre,
            'acronimo'=>$request->acronimo,
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
        $data=Sexo::find($id);
        $data->nombre=$request->nombre;
        $data->acronimo=$request->acronimo;
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
            $d=Sexo::find($item);
            $this->fixDeletes('caphum_sexo',$d->position);
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
            $last=Sexo::orderBy('position','DESC')->get()->first();
            $position=$last->position+1;
            Sexo::where('id',$id)->restore();
            Sexo::where('id',$id)->update(['position'=>$position]);
        }

        return ['success'=>true];
    }
}
