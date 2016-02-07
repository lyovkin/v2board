<?php

namespace App\View\Composers;

use Illuminate\Contracts\View\View;
use App\Models\Special;

class SliderComposer
{
    protected $specials;

    public function __construct()
    {
        $this->specials = Special::orderByRaw('RAND()')->get();
    }

    /**
     * Compose the view.
     *
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('specials', $this->specials);
    }

}