<?php

namespace App\Http\Controllers\Caphum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Caphum\Areas;

class PlantillaCargosController extends Controller
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
            'nombre'=>['header'=>true,'edit'=>false,'label'=>'Descripción(Órgano/Cargo/Técnica)'],
            'pertenece'=>['edit'=>false,'label'=>'Categoría Ocupacional'],
            'tipo_area'=>['edit'=>false,'label'=>'Cantidad de Cargos']
            // 'nivel'=>['edit'=>false,'label'=>'Nivel de Preparación'],
            // 'grupoes'=>['edit'=>false,'label'=>'Grupo Escala']
            // 'nombre'=>['edit'=>true,'label'=>'Nombre','rules'=>'data-validate-length-range="6"','type'=>'text'],
            // 'acronimo'=>['edit'=>true,'label'=>'Abreviatura','rules'=>'required','type'=>'text'],
        ];
        $new=[
            'nombre'=>['placeholder'=>'Nombre','label'=>'Nombre','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'acronimo'=>['placeholder'=>'Abreviatura','label'=>'Acrónimo','rules'=>'required|parent=nombreM','type'=>'acronimo','id'=>"acronimo"],
        ];

        $links=array(
            ['url'=>'/caphum/categoriasOcupacionales','title'=>'Categorías'],
            ['url'=>'/caphum/nivelesPreparacion','title'=>'Niveles de preparación'],
            ['url'=>'/caphum/gruposEscala','title'=>'Grupos Escalas'],
            ['url'=>'/caphum/cargos','title'=>'Cargos']
        );

        return view('caphum.plantilla.listado')->with([
            'base_title'=>'CapHum | Plantilla de cargos',
            'header'=>'Plantilla de Cargos',
            'base_icono'=>'images/iconos/generales/SVG_CUPET_Btn_On_RRHH.svg',
            'delete_path'=>'/caphum/motivosBajas',
            'update_path' => '/caphum/motivosBajas',
            'data_path' => '/caphum/getPlantilla',
            'store'=>'/caphum/motivosBajas',
            'table_form'=>$edit,
            'create_form'=>$new,
            'table'=>'caphum_motivos_bajas',
            'reactivar'=>'/caphum/motivos/reactivar',
            'links'=>$links,
            'plantilla'=>'plantilla'
            ]);
    }

    public function getJson(Request $request)
    {
        $cantidad = ($request->cantidad=='...')?1000:$request->cantidad;
        // $data = Areas::all();
        $data = ($request->filtro)?
                Areas::orderBy('pertenece','ASC')->where('nombre', 'LIKE', '%' . $request->filtro . '%')->paginate($cantidad):
                Areas::orderBy('pertenece','ASC')->paginate($cantidad);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
