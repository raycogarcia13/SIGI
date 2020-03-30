<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$rol)
    {
        if(auth()->user()->username==='root'||auth()->user()->hasRol($rol))
            return $next($request);
        return response('Acceso denegado a esta ruta');
    }
}
