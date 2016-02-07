<?php

namespace App\View\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Nottifications;
use Illuminate\Support\Facades\Auth;

class AsideComposer
{

    protected $nottifications = 0;


    public function __construct(Request $request, Nottifications $nottifications)
    {
        if(Auth::check())
        {
            $model = $nottifications::where('user_id', '=', Auth::user()->id)->get()->count();

            $this->nottifications = $model;
        }
    }

    /**
     * Compose the view.
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('nottifactions_count', $this->nottifications);
    }

}