<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caphum\Cargos;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use App\Models\Caphum\Areas;
use App\Models\Caphum\NivelesPreparacion;
use App\Models\Caphum\GruposEscalas;
use App\Models\Caphum\CategoriasOcupacionales;
use App\Models\Caphum\TiposCategoriasOcupacionales;

class CargosController extends Controller
{
    public function __construct()
    {
        View::share('menu','caphum.menu');
        $this->middleware(['auth','rol:caphum']);
        // $this->middleware('rol:config')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areass = Areas::all();
        $areas = [];
        foreach ($areass as $area) {
            $areas[$area->id] = $area->nombre;
        }

        $niveless = NivelesPreparacion::all();
        $niveles = [];
        foreach ($niveless as $nivel) {
            $niveles[$nivel->id] = $nivel->nombre;
        }

        $gruposs = GruposEscalas::all();
        $grupos = [];
        foreach ($gruposs as $grupo) {
            $grupos[$grupo->id] = $grupo->nombre;
        }

        $categoriass = CategoriasOcupacionales::all();
        $categorias = [];
        foreach ($categoriass as $categoria) {
            $categorias[$categoria->id] = $categoria->nombre;
        }

        $tiposs = TiposCategoriasOcupacionales::all();
        $tipos = [];
        foreach ($tiposs as $tipo) {
            $tipos[$tipo->id] = $tipo->nombre;
        }

        $edit=[
            'area'=>['edit'=>true,'label'=>'Área','options'=>$areas,'rules'=>'required','type'=>'select'],
            'cargo'=>['edit'=>true,'label'=>'Cargo','rules'=>'data-validate-length-range="6"','type'=>'text'],
            'nivel'=>['edit'=>true,'label'=>'Nivel','options'=>$niveles,'rules'=>'required','type'=>'select'],
            'jestablec'=>['edit'=>true,'label'=>'Jefe Estab.','rules'=>'required','type'=>'checkbox'],
            'plazas'=>['edit'=>true,'label'=>'Plazas','rules'=>'required','type'=>'text'],
            'grupos_escala'=>['edit'=>true,'label'=>'Grupo Escala','options'=>$grupos,'rules'=>'required','type'=>'select'],
            'categoria_oc'=>['edit'=>true,'label'=>'Categoría Ocupacional','options'=>$categorias,'rules'=>'required','type'=>'select'],
            'tipo_categoria_oc'=>['edit'=>true,'label'=>'Tipo Categoría Ocupacional','options'=>$tipos,'rules'=>'required','type'=>'select'],
            'funcionario'=>['edit'=>true,'label'=>'Funcionario','rules'=>'required','type'=>'checkbox'],
            'designado'=>['edit'=>true,'label'=>'Designado','rules'=>'required','type'=>'checkbox'],
            'peligroso'=>['edit'=>true,'label'=>'Peligroso','rules'=>'required','type'=>'checkbox'],
        ];
        $new=[
            'area'=>['placeholder'=>'Área','label'=>'Área','options'=>$areas,'rules'=>'required','type'=>'select','id'=>"areas"],
            'cargo'=>['placeholder'=>'Cargo','label'=>'Cargo','rules'=>'required|parent=nombreM','type'=>'text','id'=>"cargo"],
            'nivel'=>['placeholder'=>'Nivel','label'=>'Nivel','options'=>$niveles,'rules'=>'required','type'=>'select','id'=>"nivel"],
            'jestablec'=>['placeholder'=>'Jefe Estab.','label'=>'Jefe Estab.','rules'=>'','type'=>'checkbox','id'=>"jestablec"],
            'plazas'=>['placeholder'=>'Plazas','label'=>'Plazas','rules'=>'required','type'=>'number','id'=>"plazas"],
            'grupos_escala'=>['placeholder'=>'Grupo Escala','label'=>'Grupo Escala','options'=>$grupos,'rules'=>'required','type'=>'select','id'=>"nombreM"],
            'categoria_oc'=>['placeholder'=>'Categoría Ocupacional','label'=>'Categoría Ocupacional','options'=>$categorias,'rules'=>'required','type'=>'select','id'=>"categoria_oc"],
            'tipo_categoria_oc'=>['placeholder'=>'Tipo Categoría Ocupacional','label'=>'Tipo Categoría Ocupacional','options'=>$tipos,'rules'=>'required','type'=>'select','id'=>"tipo_categoria"],
            'funcionario'=>['placeholder'=>'Funcionario','label'=>'Funcionario','rules'=>'','type'=>'checkbox','id'=>"funcionario"],
            'designado'=>['placeholder'=>'Designado','label'=>'Designado','rules'=>'','type'=>'checkbox','id'=>"desigando"],
            'peligroso'=>['placeholder'=>'Peligroso','label'=>'Peligroso','rules'=>'','type'=>'checkbox','id'=>"peligroso"],
        ];

        //return view('caphum.plantilla.listado')->with([
        return view('crud.listado')->with([
            'base_title'=>'CapHum | Cargos',
            'header'=>'Cargos',
            'base_icono'=>'images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg',
            'delete_path'=>'/caphum/cargos',
            'update_path' => '/caphum/cargos',
            'data_path' => '/caphum/getCargos',
            'store'=>'/caphum/cargos',
            'table_form'=>$edit,
            'create_form'=>$new,
            'table'=>'caphum_cargos',
            'reactivar'=>'/caphum/cargoss/reactivar',
            'plantilla'=>'plantilla',
            'tipo'=>'cargos'
            ]
        );
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        $estado = isset($request->estado)?$request->estado:1;
        // $data = Cargos::all();
        if($estado==1)
            $data = ($request->filtro)?
                    Cargos::orderBy('position','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                    Cargos::orderBy('position','ASC')->paginate($cantidad);
        else
        $data = ($request->filtro)?
                    Cargos::orderBy('deleted_at','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->onlyTrashed()->paginate($cantidad):
                    Cargos::orderBy('deleted_at','ASC')->onlyTrashed()->paginate($cantidad);

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
        if(Cargos::where('nombre',$request->nombre)->count()>0 ||Cargos::where('acronimo',$request->acronimo)->count()>0)
            return ['success'=>'failed'];

        $last=Cargos::orderBy('position','DESC')->get()->first();
        $position=$last->position+1;
        Cargos::create([
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
        $data=Cargos::find($id);
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
    public function destroy($id)
    {
        $all= $request->ids;
        $deletes=[];
        $disabled=[];
        foreach($all as $item)
        {
            $d=Cargos::find($item);
            $this->fixDeletes('Cargos',$d->position);
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
            $last=Cargos::orderBy('position','DESC')->get()->first();
            $position=$last->position+1;
            Cargos::where('id',$id)->restore();
            Cargos::where('id',$id)->update(['position'=>$position]);
        }

        return ['success'=>true];
    }
}
