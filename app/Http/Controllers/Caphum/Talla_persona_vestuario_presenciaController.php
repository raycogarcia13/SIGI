<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caphum\Talla_persona_vestuario_presencia;
use App\Models\Caphum\Tallas;
use App\Models\Caphum\Prendas;
#use App\Models\Caphum\Trabajador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Talla_persona_vestuario_presenciaController extends Controller
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
        $tallas = Tallas::all();
        $tall = [];
        foreach ($tallas as $talla) {
            $tall[$talla->id] = $talla->nombre;
        }

        $prendas = Prendas::all();
        $pren = [];
        foreach ($prendas as $prenda) {
            $pren[$prenda->id] = $prenda->nombre;
        }

        // $trabajdores = Trabajadores::all();
        // $trab = [];
        // foreach ($trabaj as $trabajdor) {
        //     $trab[$trabajdor->id] = $trabajdor->nombre . " " . $trabajdor->apellidos;
        // }

        $edit=[
            'position'=>['edit'=>false,'label'=>'#'],
            'talla_id'=>['edit'=>true,'label'=>'Talla','options'=>$tall,'rules'=>'data-validate-length-range="6"','type'=>'select'],
            'prenda_id'=>['edit'=>true,'label'=>'Prenda','options'=>$pren,'rules'=>'required','type'=>'select'],
            'persona_id'=>['edit'=>true,'label'=>'Persona','rules'=>'required','type'=>'number'],
        ];
        $new=[
            'talla_id'=>['placeholder'=>'Talla','label'=>'Talla','options'=>$tall,'rules'=>'required','type'=>'number','id'=>"talla_id"],
            'prenda_id'=>['placeholder'=>'Prenda','label'=>'Prenda','options'=>$pren,'rules'=>'required|parent=nombreM','type'=>'number','id'=>"prenda_id"],
            'persona_id'=>['placeholder'=>'Persona','label'=>'Persona','rules'=>'required|parent=nombreM','type'=>'number','id'=>"persona_id"],
        ];
        return view('crud.listado')->with([
            'base_title'=>'CapHum | Talla Persona Vestuario presencia',
            'header'=>'Talla Persona Vestuario presencia',
            'base_icono'=>'images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg',
            'delete_path'=>'/caphum/tallaPerVestPres',
            'update_path' => '/caphum/tallaPerVestPres',
            'data_path' => '/caphum/getTallaPerVestPres',
            'store'=>'/caphum/tallaPerVestPres',
            'table_form'=>$edit,
            'create_form'=>$new,
            'table'=>'caphum_tallas_persona_vestuario_presencia',
            'reactivar'=>'/caphum/tallapervestpres/reactivar'
            ]);
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        $estado = isset($request->estado)?$request->estado:1;
        // $data = Talla_persona_vestuario_presencia::all();
        if($estado==1)
            $data = ($request->filtro)?
                    Talla_persona_vestuario_presencia::orderBy('position','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                    Talla_persona_vestuario_presencia::orderBy('position','ASC')->paginate($cantidad);
        else
        $data = ($request->filtro)?
                    Talla_persona_vestuario_presencia::orderBy('deleted_at','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->onlyTrashed()->paginate($cantidad):
                    Talla_persona_vestuario_presencia::orderBy('deleted_at','ASC')->onlyTrashed()->paginate($cantidad);

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
        if(Talla_persona_vestuario_presencia::where('nombre',$request->nombre)->count()>0 ||Talla_persona_vestuario_presencia::where('acronimo',$request->acronimo)->count()>0)
            return ['success'=>'failed'];

        $last=Talla_persona_vestuario_presencia::orderBy('position','DESC')->get()->first();
        $position=$last->position+1;
        Talla_persona_vestuario_presencia::create([
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
        $data=Talla_persona_vestuario_presencia::find($id);
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
            $d=Talla_persona_vestuario_presencia::find($item);
            $this->fixDeletes('caphum_tallas_persona_vestuario_presencia',$d->position);
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
            $last=Talla_persona_vestuario_presencia::orderBy('position','DESC')->get()->first();
            $position=$last->position+1;
            Talla_persona_vestuario_presencia::where('id',$id)->restore();
            Talla_persona_vestuario_presencia::where('id',$id)->update(['position'=>$position]);
        }

        return ['success'=>true];
    }
}
