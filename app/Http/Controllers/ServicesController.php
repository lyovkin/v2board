<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (\Auth::user() && \Auth::user()->profile->city_id != null) {
            $services = Services::where('time', '>=', new \DateTime('today'))->where('city_id', '=', \Auth::user()->profile->city_id)->get();

            return view('services.index', compact('services'));
        } else {

            $services = Services::where('time', '>=', new \DateTime('today'))->get();

            return view('services.index', compact('services'));
        }
    }
}