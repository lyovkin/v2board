<?php   namespace App\Services\Users;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UsersServiceServiceProvider  extends ServiceProvider
{
    
    public function register()
    {
        $this->app->bind('usersService', function($app)
        {
           
            return new UsersService(
                $app->make('App\Repositories\Users\UsersInterface')
            );
            
        });
    }
}

