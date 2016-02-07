<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Special;
use Illuminate\Http\Request;
use App\Facades\ImageUploadFacade;
use App\Models\Attachment;

/**
 * @Resource("special")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */
class AdminSpecialController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $specials = Special::orderBy('id', 'desc')->paginate(10);
        return view('admin.special.index', ['specials' => $specials]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Special $special)
	{
        return view('admin.special.create', ['special' => $special]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Special $special, Requests\SpecialRequest $request)
	{
        $imageModel = ImageUploadFacade::attachmentUpload($request->file('upl'), new Attachment(), 'specials');

        if ($imageModel) {
            $special->attachment()->associate($imageModel);
        }

        $special->fill($request->all());
        $special->save();
        return redirect()->route('admin.special.index');
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
	public function edit(Special $special)
	{
		return view('admin.special.edit', ['special' => $special]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Special $special, Requests\SpecialRequest $request)
	{
        $imageModel = ImageUploadFacade::attachmentUpload($request->file('upl'), new Attachment(), 'specials');
        $oldImage = null;
        if($imageModel){
            $oldImage = $special->attachment;
            $special->attachment()->associate($imageModel);
        }

        $special->update($request->input());

        if ($oldImage) {
            if (file_exists($oldImage->path)) {
                unlink($oldImage->path);
            }
            $oldImage->delete();
        }

        return redirect()->route('admin.special.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Special $special)
	{
		$picture = $special->attachment;
        $special->delete();

        if ($picture) {
            if (file_exists($picture->path)) {
                unlink($picture->path);
            }
            $picture->delete();
        }


        return redirect()->route('admin.special.index');
	}

}
