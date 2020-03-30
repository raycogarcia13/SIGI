<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permiso;
use Illuminate\Support\Facades\View;
use App\Models\Modulo;
use App\User;

class PermisosController extends Controller
{
    public function __construct()
    {
        View::share('menu','config.menu');
        $this->middleware(['auth','rol:config']);
        // $this->middleware('rol:config')->only('index');
    }

    public function index()
    {
        return view('config.permisos.listado')->with([
            'update_path' => "permisos",
            'permisos'=>true
            ]);
    }

    public function update(Request $request)
    {
        dd($request);
        // $user=User::findOrFail($request->id);
        // $user->Permisos()->detach();
        // $user->Permisos()->attach($request->roles);
        // return back()->with('info','Permisos actualizados');
        return ['success'=>true];
    }

    public function delete(Request $request)
    {
        // return $request;
        $user=User::findOrFail($request->user);
        $perm=$request->permiso;


    }

    public function getListasAcceso($cantidad=15, $order_by='position', $order='ASC')
    {
        $data = User::orderBy($order_by, $order)
            ->with('Permisos','persona')
            ->paginate($cantidad);
        return $data;
    }
}
