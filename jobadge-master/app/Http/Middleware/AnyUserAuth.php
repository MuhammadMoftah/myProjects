<?php

namespace App\Http\Middleware;

use Closure;

class AnyUserAuth
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
    
  
        if (auth()->guard('company')->check() ||auth()->guard('user')->check() ) {
            // dd(auth("admin")->user());
        
            return $next($request);
        }
        $request->session()->put('url.intended', url()->previous() );
        return redirect()->route('user.login.get');
    }
}
