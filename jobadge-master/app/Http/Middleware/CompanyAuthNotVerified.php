<?php

namespace App\Http\Middleware;

use Closure;

class CompanyAuthNotVerified
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
        if  ( auth()->guard('company')->check() ) {
            return $next($request);
        }
        return redirect()->route('user.login.get');
    }
}
