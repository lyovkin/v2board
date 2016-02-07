<?php namespace App\Repositories;

interface RepositoriesInterface
{
    public function findById($id);

    public function findBy($name, $value);
    
}