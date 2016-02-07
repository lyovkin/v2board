<?php
namespace App\Http\Controllers\AdminControllers;

use App\Models\Attachment;

use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use App\Facades\ImageUploadFacade;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Routing\Annotations\Annotations\Controller;
use ZaWeb\Core\Controllers\AbstractAdminController;

/**
 * @Resource("banner")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */
class AdminBannerController extends AbstractAdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->paginate(10);
        return view('admin.banner.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Banner $banner)
    {
        return view('admin.banner.create', ['banner' => $banner]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Banner $banner, BannerRequest $request)
    {
        $imageModel = ImageUploadFacade::attachmentUpload($request->file('upl'), new Attachment(), 'banners');
        $banner->attachment_id = $imageModel->id;
        $banner->paid = $request->paid == 'on' ? 1:0;
        $banner->fill($request->all());
        $banner->save();
        return redirect()->route('admin.banner.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Banner $banner)
    {

        return view('admin.$banner.show', ['banner' => $banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Banner $banner, BannerRequest $request)
    {
        $oldImage = null;
        if($request->file('upl')){
            $oldImage = Attachment::where('id', $banner->attachment_id);

            $imageModel = ImageUploadFacade::attachmentUpload($request->file('upl'), new Attachment(), 'banners');
            $banner->attachment_id = $imageModel->id;
       }

        $banner->paid = $request->paid == 'on' ? 1:0;
        
        $banner->update($request->input());

        if($oldImage) {
            $oldImage->delete();
        }
        
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Banner $banner)
    {
        $image = Attachment::where('id', $banner->attachment_id);
        $banner->delete();
        $image->delete();

        return redirect()->route('admin.banner.index');
    }



}
