<?php namespace ZaWeb\Profile\Repositories\Profile;

use ZaWeb\Profile\Repositories\Profile\ProfileRepository;
use Illuminate\Support\ServiceProvider;

class ProfileRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('ZaWeb\Profile\Repositories\Profile\ProfileInterface', function($app)
        {
           
            return new ProfileRepository;
            
        });
    }
    
}

