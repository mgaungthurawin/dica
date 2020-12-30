<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        if("ADMIN" == Auth::user()->user_type || "SUPERADMIN" == Auth::user()->user_type) {
            return $next($request);
        }

        return redirect('/');
    }
}
