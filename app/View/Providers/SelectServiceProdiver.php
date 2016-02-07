<?php

namespace App\View\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class SelectServiceProdiver extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('profile::update', 'App\View\Composers\SelectComposer');
        $view->composer('ads.create', 'App\View\Composers\SelectComposer');
        $view->composer('admin.advertisement._form', 'App\View\Composers\SelectComposer');

    }


    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
    }


}