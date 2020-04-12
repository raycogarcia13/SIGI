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
use App\Models\Caphum\TiposCategoariasOcupacionales;

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
        $area = [];
        foreach ($areass as $areas) {
            $area[$areas->id] = $areas->nombre;
        }

        $niveless = NivelesPreparacion::all();
        $nivel = [];
        foreach ($niveless as $niveles) {
            $nivel[$niveles->id] = $niveles->nombre;
        }

        $edit=[
            'area_id'=>['edit'=>true,'label'=>'Área','options'=>$area,'rules'=>'required','type'=>'select'],
            'cargo'=>['edit'=>true,'label'=>'Cargo','rules'=>'data-validate-length-range="6"','type'=>'text'],
            'nivel_id'=>['edit'=>true,'label'=>'Nivel','options'=>$nivel,'rules'=>'required','type'=>'select'],
            'jestablec'=>['edit'=>true,'label'=>'J Establecimiento','rules'=>'required','type'=>'text'],
            'plazas'=>['edit'=>true,'label'=>'Plazas','rules'=>'required','type'=>'text'],
            'grupo_escala_id'=>['edit'=>true,'label'=>'Grupo Escala','rules'=>'required','type'=>'select'],
            'categoria_oc_id'=>['edit'=>true,'label'=>'Categoría Ocupacional','rules'=>'required','type'=>'select'],
            'tipo_categoria_oc_id'=>['edit'=>true,'label'=>'Tipo Categoría Ocupacional','rules'=>'required','type'=>'select'],
            'funcionario'=>['edit'=>true,'label'=>'Funcionario','rules'=>'required','type'=>'text'],
            'designado'=>['edit'=>true,'label'=>'Designado','rules'=>'required','type'=>'text'],
            'peligroso'=>['edit'=>true,'label'=>'Peligroso','rules'=>'required','type'=>'text'],
        ];
        $new=[
            'area_id'=>['placeholder'=>'Área','label'=>'Área','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'cargo'=>['placeholder'=>'Abreviatura','label'=>'Cargo','rules'=>'required|parent=nombreM','type'=>'acronimo','id'=>"cargo"],
            'nivel_id'=>['placeholder'=>'Nivel','label'=>'Nivel','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'jestablec'=>['placeholder'=>'Jefe Establecimiento','label'=>'Jefe Establecimiento','rules'=>'','type'=>'text','id'=>"nombreM"],
            'plazas'=>['placeholder'=>'Plazas','label'=>'Plazas','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'grupo_escala_id'=>['placeholder'=>'Grupo Escala','label'=>'Grupo Escala','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'categoria_oc_id'=>['placeholder'=>'Categoría Ocupacional','label'=>'Categoría Ocupacional','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'tipo_categoria_oc_id'=>['placeholder'=>'Tipo Categoría Ocupacional','label'=>'Tipo Categoría Ocupacional','rules'=>'required','type'=>'text','id'=>"nombreM"],
            'funcionario'=>['placeholder'=>'Funcionario','label'=>'Funcionario','rules'=>'','type'=>'text','id'=>"nombreM"],
            'designado'=>['placeholder'=>'Designado','label'=>'Designado','rules'=>'','type'=>'text','id'=>"nombreM"],
            'peligroso'=>['placeholder'=>'Peligroso','label'=>'Peligroso','rules'=>'','type'=>'text','id'=>"nombreM"],
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
            'plantilla'=>'plantilla'
            ]
        );
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
