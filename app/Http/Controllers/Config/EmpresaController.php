<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Support\Facades\View;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    public function __construct()
    {
        View::share('menu','config.menu');
        $this->middleware(['auth','rol:empresa']);
        // $this->middleware('auditor')->only('edit');
    }

    public function index()
    {
        $empresa=Empresa::all()->first();
        return view('config.empresa.index',compact('empresa'));
    }

    public function edit(EmpresaRequest $request)
    {
        $empresa = Empresa::all()->first();
        if($request->file('logo'))
        {
            $logo = $request->file('logo')->store('public');
            $empresa->logo=$logo;
            $empresa->save();
            return ["msg"=>"Foto actualizada correctamente","data"=>$logo];
        } 
        else
        {
            // echo('$empresa->'.$request->element.'="'.$request->valor.'";');
            eval('$empresa->'.$request->element.'="'.$request->valor.'";');
            $empresa->save();
            return "Datos actualizados correctamente";
        }

    }

}
