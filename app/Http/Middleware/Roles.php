<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Compruebo si el campo correspondiente (usuarios o noticias) es igual a 1
        if (auth()->user()->user != 1) {
            return redirect('home')->with('warning', 'Operación no autorizada');
        }

        return $next($request);

    }
}
