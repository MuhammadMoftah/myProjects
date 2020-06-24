<?php
namespace App\Blog\Providers;


use Illuminate\Support\ServiceProvider;


class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // web
        $name   = basename(dirname(__DIR__, 1));

      
       /*   load migration  */
        $this->loadMigrationsFrom([
            app_path($name.DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."migrations")
        ]);

        // load route api
        $this->loadRoutesFrom( app_path($name.DIRECTORY_SEPARATOR."routes".DIRECTORY_SEPARATOR."api.php") );

         // load route web
         $this->loadRoutesFrom( app_path($name.DIRECTORY_SEPARATOR."routes".DIRECTORY_SEPARATOR."web.php") );

         // load views
         $this->loadViewsFrom( app_path($name.DIRECTORY_SEPARATOR."views") , "Blog");
         
       
    }




    
}