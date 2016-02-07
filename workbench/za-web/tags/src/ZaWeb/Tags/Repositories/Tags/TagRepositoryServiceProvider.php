<?php namespace ZaWeb\Tags\Repositories\Tags;

use ZaWeb\Tags\Repositories\Tags\TagRepository;
use Illuminate\Support\ServiceProvider;

class TagRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('ZaWeb\Tags\Repositories\Tags\TagInterface', function($app)
        {
           
            return new TagRepository;
            
        });
    }
    
}

