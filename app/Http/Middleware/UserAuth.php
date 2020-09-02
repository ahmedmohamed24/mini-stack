<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuth
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
        if(! Auth::guard('web')->check()){
            //not authenticated to pass this path
            $request->session()->flash('not-auth', true);
            return redirect()->route('login');
        }
        return $next($request);
    }
}
