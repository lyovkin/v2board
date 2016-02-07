<?php

namespace ZaWeb\Tags\Services\Tags;

use Illuminate\Support\Facades\View;
use ZaWeb\Tags\Repositories\Tags\TagInterface;

class TagService
{
    protected $tagRepo;

    public function __construct(TagInterface $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }


    public function viewTag(TagInterface $model)
    {
        $data = $this->tagRepo->get($model);
        return View::make('tags.tag', ['data' => $data])->render();
    }


    public function viewTagsCloud($model)
    {
        $data = $this->tagRepo->get($model);
        return View::make('tags::cloud', ['data' => $data])->render();

    }

}



