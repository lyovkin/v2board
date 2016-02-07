<?php

namespace App\View\Composers;

use DB, Auth;

class AdvComposer {

    public function compose($view)
    {
        if(Auth::check()){
            $favorites = DB::table('favorites')->whereUserId(Auth::user()->id)->lists('advertisement_id');

            $view->with('favorites', $favorites);
        }
        else{
            $view->with('favorites', null);
        }


    }

}