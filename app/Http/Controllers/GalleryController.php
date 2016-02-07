<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Gallery;

class GalleryController extends Controller {

    public function index(Gallery $gallery){
        return view('gallery.show', ['gallery' => $gallery]);
    }

}
