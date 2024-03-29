<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class UsersMiddleware
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
        if(Sentinel::check() && Sentinel::getUSer()->roles()->first()->slug=='user')
            
        return $next($request);
     else
        return redirect('/');
    }
}
