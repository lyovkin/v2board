<?php namespace ZaWeb\Questions\Repositories\Questions;


use Illuminate\Database\Eloquent\Model;

class QuestionsRepository implements QuestionsInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * 
     * @param model $model
     * @return model
     */
    public function get($model)
    {
        return $this->convertFormat($model->with('questions_attachment')->with('user')->get());
    }

    public function getQuestionById($id)
    {
        $question = $this->model->with('questions_attachment')->with('comments')->where('id', $id)->first();

        return $question;
    }
    /**
     * 
     * @param model $model
     * @return array
     */
    protected function convertFormat($model)
    {
        return $model ? (object) $model->toArray() : null;
    }
}

