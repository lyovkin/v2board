<?php
namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Annotations\Annotations\Controller;
use Symfony\Component\Routing\Annotation\Route;
use ZaWeb\Core\Controllers\AbstractAdminController;
use App\Models\AdsAttachment;

/**
 * @Resource("advertisement")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */ 
class AdminAdvertisementController extends AbstractAdminController
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ads = Advertisement::orderBy('id', 'desc');

        if ($request->input('id')) {
            $ads = $ads->where('id', '=', $request->input('id'));
        }

        if ($request->input('text')) {
            $ads = $ads->where('text', 'LIKE', '%'.$request->input('text').'%');
        }

        $ads = $ads->paginate(10);

        return view('admin.advertisement.index', [
            'ads' => $ads,
            'f_id' => $request->input('id'),
            'f_text' => $request->input('text')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Advertisement $ad)
    {
        return view('admin.advertisement.create', ['ad' => $ad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Advertisement $ad, AdvertisementRequest $request)
    {
        $attachment = ImageUploadFacade::image($request->file('attachment'));
        $ad->fill($request->all())->attachment()->associate($attachment);
        $ad->save();

        return redirect()->route('admin.advertisement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Advertisement $advertisement)
    {
        return view('admin.advertisement.show', ['advertisement' => $advertisement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Advertisement $advertisement)
    {
        $attachments = AdsAttachment::where('hash', \Session::get('advertisements_hash'))->get();
        return view('admin.advertisement.edit', compact('advertisement', 'attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Advertisement $advertisement, AdvertisementRequest $request)
    {
        $advertisement->update($request->input());

        return redirect()->route('admin.advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('admin.advertisement.index');
    }

    public function massRemove(Request $request){
        $data = $request->input();
        if (array_key_exists('ads', $data)) {
            foreach($data['ads'] as $id) {
                Advertisement::find($id)->delete();
            }
        }
    }

    public function massApprove(Request $request){
        $data = $request->input();
        if (array_key_exists('ads', $data)) {
            foreach($data['ads'] as $id) {
                $ad = Advertisement::find($id);
                $ad->approved = 1;
                $ad->save();
            }
        }
    }
}
