<?php   namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\Users\UsersRepository;
use Illuminate\Support\ServiceProvider;


class UsersRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Repositories\Users\UsersInterface', function($app)
        {
           
            return new UsersRepository(new User);
            
        });
    }
}