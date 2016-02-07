<?php namespace App\Services\Categories;

use App\Repositories\Categories\CategoriesRepository;

class CategoriesService
{
    /**
     * @var CategoriesRepository
     */
    protected $categoriesRepo;

    /**
     * @param CategoriesRepository $categoriesRepo
     */
    public function __construct(CategoriesRepository $categoriesRepo)
    {
        $this->categoriesRepo = $categoriesRepo;
    }

    /**
     * @param $id
     * @return null|object
     */
    public function getCategoryById($id)
    {
        return $this->categoriesRepo->findById($id);
    }
    
    /**
     * @return array
     */
    public function getAll()
    {
       return $this->categoriesRepo->all();
    }
}