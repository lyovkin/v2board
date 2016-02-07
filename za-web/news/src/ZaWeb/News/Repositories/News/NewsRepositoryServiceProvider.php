<?php namespace ZaWeb\News\Repositories\News;

use ZaWeb\News\Repositories\News\NewsRepository;
use Illuminate\Support\ServiceProvider;

class NewsRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('ZaWeb\News\Repositories\News\NewsInterface', function($app)
        {
           
            return new NewsRepository;
            
        });
    }
    
}

