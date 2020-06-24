<?php
// check current guard and return current user

use App\Admin;

if (!function_exists('CurrentUser')) {
    function CurrentUser()
    {
        if (auth()->guard('web')->check()) {
            return auth('web')->user();
        } elseif (auth()->guard('user')->check()) {
            return auth('user')->user();
        }
    }
}

// check current guard and return current user
if (!function_exists('getAdmins')) {
    function getAdmins()
    {
        return Admin::all();
    }
}
