<?php namespace ZaWeb\Questions\Services\Questions;

use Illuminate\Support\ServiceProvider;

class QuestionsServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('questionsService', function($app)
        {
           
            return new QuestionsService(
                $app->make('ZaWeb\Questions\Repositories\Questions\QuestionsInterface')
            );
            
        });
    }
    
}

