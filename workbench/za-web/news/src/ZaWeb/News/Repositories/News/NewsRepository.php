<?php namespace ZaWeb\News\Repositories\News;


class NewsRepository implements NewsInterface
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

