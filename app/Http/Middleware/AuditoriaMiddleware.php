<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Auditoria;

class AuditoriaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if($request->getMethod()!="GET")
            // dd($request->getMethod());
            if ( \Auth::check() && $request->getMethod()!="GET" && $request->getPathInfo()!='/logout' ) {
                switch($request->getMethod())
                {
                    case 'POST':
                        $accion="Insertar";
                        break;
                    case 'PUT':
                    case 'PATCH':
                        $accion="Editar";
                        break;
                    case 'DELETE':
                        $accion="Eliminar";
                        break;
                    default:
                        $accion="OTRO";
                        break;

                }
                $datos=$request->except('_token');
            Auditoria::create([
                'usuario_id'=>Auth::user()->id,
                'ip_pc'=>$_SERVER['REMOTE_ADDR'],
                'modulo'=>$request->getPathInfo(),
                'accion'=>$accion,
                'metodo'=>$request->getMethod(),
                'consulta'=>substr(json_encode($datos),0,254)
            ]);
        }
        return $next($request);
    }
}
