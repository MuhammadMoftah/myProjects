<?php
namespace App\Http\Middleware;

use Closure;

class UserNotAuth
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
        if (auth()->guard('user')->check() && auth()->guard('user')->user()->activation == 1) {
            return redirect(route('user.index'));
        }
        return $next($request);
    }
}
