<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Class UploadVKItemsController
 * @package App\Http\Controllers
 * @Middleware("auth")
 */
class UploadVKItemsController extends Controller {

    /**
     * @GET("/upload_vk_items")
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('upload_vk_items.index');
    }

}
