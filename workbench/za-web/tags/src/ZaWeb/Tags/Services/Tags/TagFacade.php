<?php namespace ZaWeb\Tags\Services\Tags;

use \Illuminate\Support\Facades\Facade;


class TagFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'tagService'; }
}