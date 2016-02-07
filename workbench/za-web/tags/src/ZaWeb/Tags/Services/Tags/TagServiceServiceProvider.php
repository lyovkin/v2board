<?php namespace ZaWeb\Tags\Services\Tags;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Model;
class TagServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('tagService', function($app)
        {
           
            return new TagService(
                $app->make('ZaWeb\Tags\Repositories\Tags\TagInterface')
            );
            
        });
    }
    
}

