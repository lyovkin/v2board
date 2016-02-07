<?php namespace ZaWeb\News\Services\News;

use Illuminate\Support\ServiceProvider;

class NewsServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('newsService', function($app)
        {
           
            return new NewsService(
                $app->make('ZaWeb\News\Repositories\News\NewsInterface')
            );
            
        });
    }
    
}

