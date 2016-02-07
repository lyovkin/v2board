<?php namespace App\Repositories\Categories;

use App\Models\Category;
use App\Repositories\Categories\CategoriesRepository;
use Illuminate\Support\ServiceProvider;

class CategoriesRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Categories\CategoriesInterface',
            function ($app) {
                return new CategoriesRepository(new Category());
            }
        );
    }
}