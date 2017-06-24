<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='web')
    {
         if(!Auth::guard($guard)->check()){
            // $currentPath= Route::currentRouteName();
            return redirect()->route('getlogin');
        }
        return $next($request);
    }
}
