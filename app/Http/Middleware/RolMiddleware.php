<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        foreach ($roles as $rol) {
            if (auth()->user()->tenerRol($rol)){
                return $next($request);
            }
        }

        abort(404);

        //$roles = array_slice(func_get_args(),2) ; esto es una forma de recuperar los parametros desde la ruta
        //dd($roles);
        //return $next($request);
    }
}
