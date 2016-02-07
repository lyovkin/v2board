<?php namespace App\Repositories\Categories;

use App\Repositories\AbstractRepository;
use App\Repositories\RepositoriesInterface;
use Illuminate\Database\Eloquent\Model;

class CategoriesRepository extends AbstractRepository implements RepositoriesInterface
{
    
    protected $model;

    /**
     * @param string $categoryTitle
     * @return null|object
     */
    public function findByTitle($categoryTitle)
    {
        $category = $this->model->where('title', strtolower($categoryTitle));

        if ($category) {
            return $this->convertFormat($category->first());
        }

        return null;
    }
    
    public function all()
    {
        $category  = $this->model->all()->lists('title', 'id');
        if($category)
        {
            return $category;
        }
        
        return null;
        
    }
}