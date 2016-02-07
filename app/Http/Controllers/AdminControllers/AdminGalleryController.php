<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Gallery;
use App\Models\GalleryAttachment;
use Illuminate\Http\Request;
use App\Facades\ImageUploadFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

/**
 * @Resource("gallery")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 *
 */
class AdminGalleryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $galleries = Gallery::orderBy('id', 'desc')->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Gallery $gallery)
	{
        Session::forget('gallery_hash');
        return view('admin.gallery.create', ['gallery' => $gallery]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Gallery $gallery, Requests\GalleryRequest $request)
	{
        $hash = Session::get('gallery_hash');
        $gallery->fill($request->input());
        $gallery->attachment_hash = $hash;
        $gallery->save();
        Session::forget('gallery_hash');

        $attachments = GalleryAttachment::where('hash', $hash )->get();

        foreach ($attachments as $attachment) {
            $attachment->update([
                'comment' => \Input::get($attachment->id),
                'link' => \Input::get('link'.$attachment->id)
            ]);
        }

        \Session::flash('message', 'Галлерея создана');
        return redirect()->route('admin.gallery.index');
	}

    /**
     * @param Request $request
     * @Post("/gallery/upload")
     * @Patch("/gallery/upload")
     */
    public function upload(Request $request) {
        if (!Session::has('gallery_hash')) {
            Session::put('gallery_hash', md5(time()));
        }

        return Response::json([
            'attachment' => ImageUploadFacade::attachmentUpload($request->file('upl'), new GalleryAttachment(), 'gallery', true)
        ]);
    }

    /**
     * @param $id
     *
     * @Delete("/gallery/attachment/{attachment}")
     */
    public function delAttachment($id){
        $status = 'ok';
        $attachment = GalleryAttachment::find($id);
        if ($attachment) {
            unlink($attachment->path);
            $attachment->delete();
        } else {
            $status = 'Изображение не найдено';
        }

        return Response::json([
            'status' => $status,
            'id' => $id
        ]);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Gallery $gallery)
	{
        Session::put('gallery_hash', $gallery->attachment_hash);
        $attachments = GalleryAttachment::where('hash', $gallery->attachment_hash)->get();
        return view('admin.gallery.edit', [
            'gallery' => $gallery,
            'attachments' => $attachments
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Gallery $gallery, Requests\GalleryRequest $request)
	{
        $gallery->update($request->input());
        $hash = Session::get('gallery_hash');

        $attachments = GalleryAttachment::where('hash', $hash )->get();

        foreach ($attachments as $attachment) {
            $attachment->update([
                'comment' => \Input::get($attachment->id),
                'link' => \Input::get('link'.$attachment->id)
            ]);
        }

        Session::forget('gallery_hash');
        \Session::flash('message', 'Галлерея обновлена');
        return redirect()->route('admin.gallery.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Gallery $gallery)
	{
        $gallery->delete();
        \Session::flash('message', 'Галлерея удалена');
        return redirect()->route('admin.gallery.index');
	}

}
