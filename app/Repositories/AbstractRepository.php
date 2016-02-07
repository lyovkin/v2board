<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository {
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return null|object
     */
    public function findById($id)
    {
        return $this->convertFormat($this->model->find($id));
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return null|object
     */
    public function findBy($name, $value)
    {
        $model = $this->model->where($name, strtolower($value));

        if ($model) {
            return $this->convertFormat($model->first());
        }

        return null;
    }
    /**
     * @param \Illuminate\Support\Collection|null|static $model
     * @return null|object
     */
    protected function convertFormat($model)
    {
        return $model ? (object) $model->toArray() : null;
    }
}