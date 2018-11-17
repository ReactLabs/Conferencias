<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{

    const ADMIN_TYPE = 'admin';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->type == self::ADMIN_TYPE){
            return $next($request);
        }
        return redirect('/home');
    }
}
