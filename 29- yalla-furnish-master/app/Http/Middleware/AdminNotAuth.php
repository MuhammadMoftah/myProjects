<?php

namespace App\Http\Middleware;

use Closure;

class AdminNotAuth
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
        if (!auth()->guard('web')->check()) {
            return $next($request);
        }
        return redirect()->route('admin.dashboard');
    }
}
