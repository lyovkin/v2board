<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Facades\ImageUploadFacade;
use Illuminate\Http\Request;

class ImageUploadController extends Controller {

    /**
     * @param Request $request
     *
     * @Post("/image/upload");
     */
	public function upload(Request $request){
        $error = '';

        try {
            $url = ImageUploadFacade::upload($request->file('upload'), 'inline');
        } catch (\Exception $e){
            $error = $e->getMessage();
        }

        $callback = $request->input('CKEditorFuncNum');

        return "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(".$callback.
        ",\"".$url."\", \"".$error."\" );</script>";
    }

}
