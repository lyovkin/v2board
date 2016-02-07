<?php namespace ZaWeb\Shops;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ShopsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        include __DIR__ . '/Http/routes.php';

    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        View::addNamespace('shops', __DIR__ . '/../../views');

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

}
