<?php

namespace App\Aside\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use ZaWeb\Tags\Models\Tags;
use Illuminate\Contracts\View\View;
use App\Models\Category;

class LeftAsideComposer
{


    public function __construct()
    {
    }

    /**
     * Compose the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $value = Cache::remember('users', 3, function () {
            return DB::table('users')->get();
        });

        $view->with('tags', Tags::all())->with('categories', Category::all());
    }

}