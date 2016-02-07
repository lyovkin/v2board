<?php namespace App\Services\Categories;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('CategoriesService', function($app) {
                return new CategoriesService(
                    $app->make('App\Repositories\Categories\CategoriesInterface')
                );
            });
    }
}