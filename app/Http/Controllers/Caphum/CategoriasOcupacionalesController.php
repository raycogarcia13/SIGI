<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caphum\CategoriasOcupacionales;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CategoriasOcupacionalesController extends Controller
{
    /*
    CategoriasOcupacionales Class
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
            'acronimo'=>['edit'=>true,'label'=>'Abreviatura','rules'=>'required','type'=>'text'],
            'tipo'=>['edit'=>true,'label'=>'Tipo','rules'=>'required','type'=>'text'],
        ];
        $new=[
            'nombre'=>['placeholder'=>'Nombre','label'=>'Nombre','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'acronimo'=>['placeholder'=>'Abreviatura','label'=>'Abreviatura','rules'=>'required|parent=nombreM','type'=>'acronimo','id'=>"acronimo"],
            'tipo'=>['placeholder'=>'Tipo','label'=>'Tipo','rules'=>'required|parent=nombreM','type'=>'tipo','id'=>"tipo"],
        ];

        $links=array(
            ['url'=>'/caphum/tiposCategoriasOcupacionales','title'=>'Tipos de Categorías']
        );

        return view('crud.listado')->with([
            'base_title'=>'CapHum | Categorias Ocupacionales',
            'header'=>'Categorias Ocupacionales',
            'base_icono'=>'images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg',
            'delete_path'=>'/caphum/categoriasOcupacionales',
            'update_path' => '/caphum/categoriasOcupacionales',
            'data_path' => '/caphum/getCategoriasOcupacionales',
            'store'=>'/caphum/categoriasOcupacionales',
            'table_form'=>$edit,
            'create_form'=>$new,
            'table'=>'caphum_categorias_ocupacionales',
            'links'=>$links,
            'reactivar'=>'/caphum/ocupacionales/reactivar',
            ]);
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        $estado = isset($request->estado)?$request->estado:1;
        // $data = CategoriasOcupacionales::all();
        if($estado==1)
            $data = ($request->filtro)?
                    CategoriasOcupacionales::orderBy('position','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                    CategoriasOcupacionales::orderBy('position','ASC')->paginate($cantidad);
        else
        $data = ($request->filtro)?
                    CategoriasOcupacionales::orderBy('deleted_at','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->onlyTrashed()->paginate($cantidad):
                    CategoriasOcupacionales::orderBy('deleted_at','ASC')->onlyTrashed()->paginate($cantidad);

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
        if(CategoriasOcupacionales::where('nombre',$request->nombre)->count()>0 || CategoriasOcupacionales::where('acronimo',$request->acronimo)->count()>0)
            return ['success'=>'failed'];

        $last=CategoriasOcupacionales::orderBy('position','DESC')->get()->first();
        $position=$last->position+1;
        CategoriasOcupacionales::create([
            'nombre'=> $request->nombre,
            'acronimo'=>$request->acronimo,
            'tipo'=>$request->tipo,
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
        $data=CategoriasOcupacionales::find($id);
        $data->nombre=$request->nombre;
        $data->acronimo=$request->acronimo;
        $data->tipo=$request->tipo;
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
            $d=CategoriasOcupacionales::find($item);
            $this->fixDeletes('caphum_categorias_ocupacionales',$d->position);
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
            $last=CategoriasOcupacionales::orderBy('position','DESC')->get()->first();
            $position=$last->position+1;
            CategoriasOcupacionales::where('id',$id)->restore();
            CategoriasOcupacionales::where('id',$id)->update(['position'=>$position]);
        }

        return ['success'=>true];
    }
}

