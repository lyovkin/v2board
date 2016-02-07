<?php

namespace App\View\Composers;


use App\Models\AdType;

class TypeComposer {

    public function compose($view)
    {
        $types = AdType::all();
        $view->with('types', $types);
    }

}