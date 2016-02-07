<?php namespace ZaWeb\News\Services\News;

use Illuminate\Support\Facades\Facade;


class NewsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'newsService';
    }
}