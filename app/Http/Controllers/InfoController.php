<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Routing\Annotations\Annotations\Get;
use ZaWeb\Core\Controllers\AbstractController;

/**
 * @Middleware("guest")
 */
class InfoController extends AbstractController
{
    /**
     *
     * @return Response
     * @Get("/info")
     */
    public function index()
    {
        return view('info.index');
    }


    /**
     *
     * @return Response
     * @Get("/info/contact")
     */
    public function contact()
    {
        return view('info.contact');
    }


    /**
     *
     * @return Response
     * @Get("/info/about")
     */
    public function about()
    {
        return view('info.about');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function rules()
    {
        return view('info.rules');
    }

}
