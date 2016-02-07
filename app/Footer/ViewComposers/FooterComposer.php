<?php

namespace App\Footer\ViewComposers;

use App\Models\UsefulLink;
use Illuminate\Contracts\View\View;

class FooterComposer
{

    protected $useful_links;

    public function __construct()
    {
        $this->useful_links = UsefulLink::all();
    }

    /**
     * Compose the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('useful_links', $this->useful_links);

    }

}