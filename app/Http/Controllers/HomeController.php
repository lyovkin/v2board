<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use ZaWeb\Core\Controllers\AbstractController;
use ZaWeb\Tags\Models\Tags;
use App\Models\Category;
use App\Models\Cities;
use Illuminate\Http\Request;

class HomeController extends AbstractController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Show the application dashboard to the user.
     */
    public function index(Advertisement $advertisement, Request $request)
    {

        $ads = $advertisement->approved()->orderBy('top', 'desc')->orderBy('id', 'desc');

        if($_SERVER['HTTP_HOST'] == env('HOST'))
        {
            $ads = $ads->paginate(10);
        }else
        {
            $ads = $ads->paginate(20);
        }
        return view('welcome', compact('ads'));

    }

}
