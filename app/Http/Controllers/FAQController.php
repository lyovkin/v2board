<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Class FAQController
 * @package App\Http\Controllers
 */
class FAQController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
	public function index()
    {
        return view('faq.index');
    }

}
