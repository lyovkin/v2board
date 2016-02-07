<?php

namespace App\View\Composers;
use App\Models\Category;

/**
 * Class CategoryComposer
 * @package App\View\Composers
 */
class CategoryComposer {

    public function compose($view)
    {
        $categories = Category::all();

        $view->with('categories', $categories);
    }

}