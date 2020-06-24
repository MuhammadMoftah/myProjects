<?php

namespace App\Http\Middleware;

use Closure;

class CompanyAuth
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
        if  ( auth()->guard('company')->check() && auth()->guard('company')->user()->isActivated() ) {
            return $next($request);
        }

        if( $request->isMethod('post')  ){
            $request->session()->put('url.intended', url()->previous() );
        }
        $request->session()->put('url.intended', url()->current() );
        
        return redirect()->route('user.login.get');
    }
}
