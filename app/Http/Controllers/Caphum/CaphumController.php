<?php

namespace App\Http\Controllers\Caphum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Trabajador;

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
}
