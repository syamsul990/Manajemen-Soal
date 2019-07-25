<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
         //dd(auth()->user()->level);
        if(auth()->user()->level == 1){
            return $next($request);
        }

        return redirect()->back();
    }
}
