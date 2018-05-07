<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEventoEscola
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

        if (Auth::check())
        {

            if (Auth::user()->permission_id == 2)
            {
                return $next($request);
            }
            return redirect(401);

        }else{
            return redirect()->route('login');
        }
    }
}
