<?php

namespace App\View\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class PageNameServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('layoutBlocks.pageHead', 'App\View\Composers\PageNameComposer');
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