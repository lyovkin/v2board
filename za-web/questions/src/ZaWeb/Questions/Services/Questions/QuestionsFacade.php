<?php namespace ZaWeb\Questions\Services\Questions;

use Illuminate\Support\Facades\Facade;


class QuestionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'questionsService';
    }
}