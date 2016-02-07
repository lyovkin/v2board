<?php   namespace App\Services\Users;

use \Illuminate\Support\Facades\Facade;

class UsersFacade extends Facade
{
    
    protected static function getFacadeAccessor()
    {
        return 'usersService';
    }
}

