<?php

namespace App\Sidebar\ViewComposers;

use Illuminate\Contracts\View\View;

class SideComposer
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
        $view->with('variable','test');
    }

}