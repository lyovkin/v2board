<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\Glide\ServerFactory;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'App\Services\Registrar'
        );


        $this->app->singleton('League\Glide\Server',function($app){
            $filesystem = $app->make('Illuminate\Contracts\Filesystem\Filesystem');

            return ServerFactory::create([
                'source' => $filesystem->getDriver(),
                'cache' => $filesystem->getDriver(),
                'source_prefix_path' =>public_path(). 'images',
                'cache_prefix_path' => public_path().'images/.cache',
            ]);

        });
    }


}
