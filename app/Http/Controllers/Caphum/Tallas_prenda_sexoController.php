<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caphum\Tallas_prenda_sexo;
use App\Models\Caphum\Tallas;
use App\Models\Caphum\Prendas;
use App\Models\Caphum\Sexo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Tallas_prenda_sexoController extends Controller
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
        $sexos = Sexo::all();
        $sex = [];
        foreach ($sexos as $sexo) {
            $sex[$sexo->id] = $sexo->nombre;
        }

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

        $edit=[
            'prenda_id'=>['edit'=>true,'label'=>'Prenda','options'=>$pren,'rules'=>'required', 'type'=>'select'],
            'sexo_id'=>['edit'=>true,'label'=>'Sexo','options'=>$sex,'rules'=>'data-validate-length-range="6"','type'=>'select'],
            'talla_id'=>['edit'=>true,'label'=>'Talla','options'=>$tall,'rules'=>'required','type'=>'select'],
        ];
        $new=[
            'prenda_id'=>['placeholder'=>'Prenda','label'=>'Prenda','rules'=>'required','type'=>'number','id'=>"prenda_id"],
            'sexo_id'=>['placeholder'=>'Sexo','label'=>'Sexo','rules'=>'required|parent=nombreM','type'=>'acronimo','id'=>"sexo_id"],
            'talla_id'=>['placeholder'=>'Talla','label'=>'Talla','rules'=>'required|parent=nombreM','type'=>'acronimo','id'=>"talla_id"],
        ];
        return view('crud.listado')->with([
            'base_title'=>'CapHum | Tallas Prenda Sexo',
            'header'=>'Tallas Prenda Sexo',
            'base_icono'=>'images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg',
            'delete_path'=>'/caphum/tallasPrendasSexo',
            'update_path' => '/caphum/tallasPrendasSexo',
            'data_path' => '/caphum/getTallasPrendasSexo',
            'store'=>'/caphum/tallasPrendasSexo',
            'table_form'=>$edit,
            'create_form'=>$new,
            'table'=>'caphum_tallas_prenda_sexo',
            'reactivar'=>'/caphum/tallasprendassexos/reactivar'
            ]);
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        $estado = isset($request->estado)?$request->estado:1;
        // $data = Tallas_prenda_sexo::all();
        if($estado==1)
            $data = ($request->filtro)?
                    Tallas_prenda_sexo::orderBy('talla_id','ASC')->where('prenda_id', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                    Tallas_prenda_sexo::orderBy('talla_id','ASC')->paginate($cantidad);
        else
        $data = ($request->filtro)?
                    Tallas_prenda_sexo::orderBy('deleted_at','ASC')->where('prenda_id', 'LIKE', '%' . $request->filtro . '%')->onlyTrashed()->paginate($cantidad):
                    Tallas_prenda_sexo::orderBy('deleted_at','ASC')->onlyTrashed()->paginate($cantidad);

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
        if(Tallas_prenda_sexo::where('prenda_id',$request->prenda_id)->count()>0 ||Tallas_prenda_sexo::where('talla_id',$request->talla_id)->count()>0 ||Tallas_prenda_sexo::where('sexo_id',$request->sexo_id)->count()>0)
            return ['success'=>'failed'];

        $last=Tallas_prenda_sexo::orderBy('talla_id','DESC')->get()->first();
        $position=$last->position+1;
        Tallas_prenda_sexo::create([
            'talla_id'=> $request->talla_id,
            'prenda_id'=>$request->prenda_id,
            'sexo_id'=>$request->sexo_id,
            //'position'=>$last->position+1
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
        $data=Tallas_prenda_sexo::find($id);
        $data->prenda_id=$request->prenda_id;
        $data->talla_id=$request->talla_id;
        $data->sexo_id=$request->sexo_id;
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
            $d=Tallas_prenda_sexo::find($item);
            $this->fixDeletes('caphum_tallas_prenda_sexo',$d->position);
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
            $last=Tallas_prenda_sexo::orderBy('position','DESC')->get()->first();
            $position=$last->position+1;
            Tallas_prenda_sexo::where('id',$id)->restore();
            Tallas_prenda_sexo::where('id',$id)->update(['position'=>$position]);
        }

        return ['success'=>true];
    }
}
