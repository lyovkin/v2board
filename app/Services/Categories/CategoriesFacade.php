<?php namespace App\Services\Categories;

use Illuminate\Support\Facades\Facade;

class CategoriesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CategoriesService';
    }
}