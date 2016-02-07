<?php

namespace App\Footer;


use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class FooterServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('layoutBlocks.footer', 'App\Footer\ViewComposers\FooterComposer');
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