<?php

namespace App\Aside\ViewComposers;


use ZaWeb\Tags\Models\Tags;

use Illuminate\Contracts\View\View;

class AsideComposer
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
        $view->with('tags', Tags::get());
    }

}