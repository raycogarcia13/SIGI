<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Trabajador;
use Illuminate\Support\Facades\DB;

class CaphumController extends Controller
{
    public function __construct()
    {
        View::share('menu','caphum.menu');
        $this->middleware(['auth','rol:caphum']);
        // $this->middleware('rol:config')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores=Trabajador::all();
        return view('caphum.index')
        ->with('trabajadores',$trabajadores)
        ->with('cumpleanos',true)
        ->with('capacitacion',false);
        // return view('caphum.index', [
        //     'trabajadores'=>$trabajadores,
        //     'cumpleanos'=>null,
        // ]);
    }

    /**
     * Send json data
     *
     * @return  \Uliminate\Http\Response
     */
    public function getGraficos($datos = null)
    {
        $trabajadores = Trabajador::select('ci')->get();

        $mas = 0;
        $fem = 0;
        foreach ($trabajadores as $key => $value) {
            $valor = substr($value->ci, 9, 1);
            ($valor/2) ? $mas++ : $fem++;
        }

        $grafico_sexo = [];
        $grafico_sexo = array(
            'sexos' => array("masculino", "femenino"),
            'valores'=> array($mas,$fem),
        );


        $tabla_sexos = [
            ["masculino", $mas],
            ["femenino", $fem]
        ];



        if ($datos == "grafico_sexos")
        {
            return json_encode($grafico_sexo);
        }
        elseif ($datos == "tabla_sexos")
        {
            return json_encode($tabla_sexos);
        }

        return pass;

    }
}
