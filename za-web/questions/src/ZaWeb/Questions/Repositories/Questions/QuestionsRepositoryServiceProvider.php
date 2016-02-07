<?php namespace ZaWeb\Questions\Repositories\Questions;

use ZaWeb\Questions\Models\Question;
use ZaWeb\Questions\Repositories\Questions\QuestionsRepository;
use Illuminate\Support\ServiceProvider;

class QuestionsRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('ZaWeb\Questions\Repositories\Questions\QuestionsInterface', function($app)
        {
           
            return new QuestionsRepository(new Question());
            
        });
    }
    
}

