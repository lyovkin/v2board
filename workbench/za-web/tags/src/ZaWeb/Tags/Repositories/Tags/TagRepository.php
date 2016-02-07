<?php namespace ZaWeb\Tags\Repositories\Tags;

use Illuminate\Database\Eloquent\Model;

class TagRepository implements TagInterface
{

    /**
     * 
     * @param model $model
     * @return model
     */
    public function get($model)
    {
        return $model;
    }


    protected function convertFormat($model)
    {
    return $model ? (object) $model->toArray() : null;
    }
}

