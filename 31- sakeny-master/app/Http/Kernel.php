<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, //Commented By Mark cause make issue with validation min and max when input empty
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [

        //admin middleware
        'admin.auth' => \App\Http\Middleware\Auth\Admin\Authenticate::class,
        'admin.guest' => \App\Http\Middleware\Auth\Admin\RedirectIfAuthenticated::class,
        'admin.permission' => \App\Http\Middleware\Auth\Admin\Permission::class,

        //user middleware
        'user.auth' => \App\Http\Middleware\Auth\User\Authenticate::class,
        'user.guest' => \App\Http\Middleware\Auth\User\RedirectIfAuthenticated::class,
        'user.api' => \App\Http\Middleware\Auth\User\ApiMiddleware::class,


        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        'localization' => \App\Http\Middleware\Localization::class,
        'admin_localization' => \App\Http\Middleware\AdminLocalization::class,
        'user_auth' => \App\Http\Middleware\UserAuth::class,
        'company_auth' => \App\Http\Middleware\CompanyAuth::class,
        'user_not_auth' => \App\Http\Middleware\UserNotAuth::class,
        'company_user_auth' => \App\Http\Middleware\CompanyUserAuth::class,
        'agent_auth' => \App\Http\Middleware\AgentAuth::class,
        'company_agent_auth' => \App\Http\Middleware\CompanyAgentAuth::class,
        'company_user_agent_auth' => \App\Http\Middleware\CompanyUserAgentAuth::class,

        /**** MCAMARA MIDDLEWARE ****/
        'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class


    ];
}
