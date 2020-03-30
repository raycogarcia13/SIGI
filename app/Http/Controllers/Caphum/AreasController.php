<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Caphum\Areas;

class AreasController extends Controller
{
    public function __construct()
    {
        View::share('menu','caphum.menu');
        $this->middleware(['auth','rol:caphum'] );
        // $this->middleware('rol:config')->only('index');
    }

    public function index()
    {
        $todos=Areas::all();
        $datos=[];
        foreach($todos as $item)
        {
            $d=array(
                'key'=>$item->id,
                'name'=>$item->nombre,
                'title'=>$item->tipo_area
            );
            if($item->pertenece!='')
            $d['parent']=$item->pertenece;
            $datos[]=$d;
        }
        return view('caphum.areas.index')->with('datos',$datos);
    }

    public function store(Request $req)
    {
        $values=json_decode($req->datos)->nodeDataArray;
        Areas::truncate();
        foreach($values as $item)
        {
            $area=new Areas();
            $area->id=$item->key;
            $area->nombre=$item->name;
            $area->tipo_area=$item->title;
            if(isset($item->parent))
                $area->pertenece=$item->parent;
            $area->save();
        }
        // Flash::success('Estructura de la empresa actualizada correctamente.');

        return array('success'=>true);
    }
}
