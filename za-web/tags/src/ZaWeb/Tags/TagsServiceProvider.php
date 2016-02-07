<?php namespace ZaWeb\Tags;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TagsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        View::addNamespace('tags', __DIR__ . '/../../views');

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
