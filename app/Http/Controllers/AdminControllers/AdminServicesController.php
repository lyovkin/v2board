<?php namespace App\Http\Controllers\AdminControllers;

use App\Models\Attachment;
use App\Facades\ImageUploadFacade;
use App\Http\Requests\ServiceRequest;
use App\Models\Services;
use Illuminate\Contracts\Routing\Middleware;
use ZaWeb\Core\Controllers\AbstractAdminController;

class AdminServicesController extends AbstractAdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $services = Services::orderBy('id', 'desc')->paginate(10);
        return view('admin.services.index', compact('services') );
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param Services $services
     * @return \Illuminate\View\View
     */
	public function create(Services $services)
	{
		return view('admin.services.create', compact('services'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Services $services, ServiceRequest $request)
	{
        $imageModel = ImageUploadFacade::attachmentUpload($request->file('upl'), new Attachment(), 'services');
        $services->attachment_id = $imageModel->id;
        $services->fill($request->all());
        $services->save();
        return redirect()->route('admin.services.index');
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
     * @param Services $services
     * @return \Illuminate\View\View
     */
	public function edit(Services $services)
	{
		return view('admin.services.edit', compact('services'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Services $services
     * @param ServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Services $services, ServiceRequest $request)
	{
        $oldImage = null;

        if($request->file('upl')){
            $oldImage = Attachment::where('id', $services->attachment_id);

            $imageModel = ImageUploadFacade::attachmentUpload($request->file('upl'), new Attachment(), 'services');
            $services->attachment_id = $imageModel->id;
        }

        $services->update($request->input());

        if($oldImage) {
            $oldImage->delete();
        }

        return redirect()->route('admin.services.index');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Services $services
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
	public function destroy(Services $services)
	{
        $image = Attachment::where('id', $services->attachment_id);
        $services->delete();
        $image->delete();
        return redirect()->route('admin.services.index');
	}

}
