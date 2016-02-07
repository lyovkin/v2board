<?php

namespace App\Aside;


use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class AsideServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('layoutBlocks.aside', 'App\Aside\ViewComposers\AsideComposer');
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