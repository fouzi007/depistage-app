<?php

namespace App\Http\Middleware;

use Closure;

class CheckMedecin
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
	    if(auth()->user()->hasAnyRole(['admin','medecin'])){
		    return $next($request);
	    };
	    return redirect('/laboratoire');
    }
}
