<?php namespace ZaWeb\Profile\Services\Profile;

use Illuminate\Support\Facades\Facade;


class ProfileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'profileService';
    }
}