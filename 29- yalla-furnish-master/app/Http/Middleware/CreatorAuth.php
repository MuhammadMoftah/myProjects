<?php

namespace App\Http\Middleware;

use Closure;

class CreatorAuth
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
        if (auth()->guard('user')->user()->content_creator == 1) {
            return $next($request);
        }
        return redirect()->route('user.my.profile');
    }
}
