<?php namespace ZaWeb\Chat;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
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
        include __DIR__.'/Http/events.php';
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        View::addNamespace('chat', __DIR__ . '/../../views');

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
