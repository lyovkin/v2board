<?php

namespace App\View\Composers;

use App\Models\AdType;
use AppAdmin\Models\PageName;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cities;

class SelectComposer
{

    protected $categories;

    protected $cities;

    public function __construct()
    {
        $this->categories = Category::lists('title', 'id');
        $this->cities = Cities::get()->toArray();
        $this->ad_types = AdType::lists('name', 'id');
    }

    /**
     * Compose the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
        $view->with('cities', $this->cities);
        $view->with('ad_types', $this->ad_types);
    }

}