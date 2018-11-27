<?php

namespace App\Http\Middleware;

use Closure;

class IsActive
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
        try{
            if (\Auth::user()->active) {
                return $next($request);
            }else{
                \Auth::guard()->logout();
                return redirect('login')->with('failed',"You can't enter any system! contact the administrator!");
            }
        }catch(\Exception $e){
            return redirect('login')->with('failed',"You need to login in the system!");
        }
    }
}
