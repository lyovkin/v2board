<?php

namespace App\View\Composers;


use App\Models\Cities;

class CityComposer {

    public function compose($view)
    {
        $cities = Cities::all();

        $view->with('cities', $cities);
    }
}