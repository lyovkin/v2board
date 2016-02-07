<?php

namespace App\View\Composers;

use AppAdmin\Models\PageName;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageNameComposer
{

    protected $pageName;


    public function __construct(Request $request, PageName $pageName)
    {
       $model = $pageName::where('route' ,'=', $request->route()->getName())->first();
        if(!$model){
            $model = $pageName::where('path' ,'=', $request->path())->first();
        }

       $this->pageName= $model;
    }

    /**
     * Compose the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('pageName', $this->pageName);
    }

}