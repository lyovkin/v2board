<?php

namespace App\Aside;


use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class LeftAsideServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('layoutBlocks.left_aside', 'App\Aside\ViewComposers\LeftAsideComposer');
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