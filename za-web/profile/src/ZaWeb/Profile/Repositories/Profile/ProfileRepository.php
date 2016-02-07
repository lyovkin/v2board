<?php namespace ZaWeb\Profile\Repositories\Profile;


class ProfileRepository implements ProfileInterface
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

