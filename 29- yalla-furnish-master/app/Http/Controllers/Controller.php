<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;

class Controller extends BaseController
{
    use  DispatchesJobs, ValidatesRequests; 
    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    public function authorize($ability, $arguments = [])
    {
        if (Auth::guard('web')->check()) {
            Auth::shouldUse('web');
        } else {
            Auth::shouldUse('user');
        }   
        $this->baseAuthorize($ability, $arguments);
    }
    
}
