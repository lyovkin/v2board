<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\StaticPage;

class StaticPageController extends Controller {

	public function index(StaticPage $page){
        return view('page.show', ['page' => $page]);
    }

}
