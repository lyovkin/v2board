<?php

namespace App\Facades;

use App\Services\Image\ImageUploadService;
use Illuminate\Support\Facades\Facade;

class ImageUploadFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return new ImageUploadService();
    }

}