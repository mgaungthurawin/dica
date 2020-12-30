<?php

namespace App\Http\Middleware\Frontend;
use Auth;
use Closure;

class LoginMiddleware
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
        if(Auth::user()) {
            return $next($request);
        }
        return redirect('/login');
    }
}
