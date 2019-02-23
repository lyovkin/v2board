<?php

namespace App\Http\Controllers;

use App\Facades\ImageUploadFacade;
use App\Models\AdsAttachment;
use App\Models\Advertisement;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use ZaWeb\Core\Controllers\AbstractController;
use App\Http\Requests\AdvertisementRequest;

use Redirect;
use App\Models\User;
use DB;
/**
 * Class AdsController
 * @package App\Http\Controllers
 * @Resource("/ads")
 * @Middleware("auth", except={"show"})
 */
class AdsController extends AbstractController
{

    /**
     * Display a listing of the resource.
     * GET /ads
     *
     * @return Response
     */
    public function index(Request $request, Advertisement $advertisement)
    {
        $ads = $advertisement::approved()
                ->with('city')
                ->with('ads_attachment')
                ->with('category')
                ->with('user')->orderBy('id', 'desc')->remember(5)->paginate(9);
        return view('ads.index', ['ads' => $ads]);
        
        //
    }

    /**
     *
     * Display ads that belongs to authorised user
     *
     * @Get("/ads/my", as="ads.my")
     */
    public function my(){
        $user = Auth::user();
        return view('ads.my', ['ads' => $user->advertisements, 'user' => $user]);
    }

    /**
     * @Post("/ads/{ads}/rise", as="ads.rise")
     */
    public function rise(Advertisement $advertisement){
        $user = Auth::user();
        if ($user->ads_rise) {
            $advertisement->rating++;

            // flag top = 0 into all ads, and flag = 1 in last ad
            $ads_top = Advertisement::where('top', '=', 1)->get();

            foreach($ads_top as $at) {
                $at->top = 0;
                $at->update();
            }

            $advertisement->top = 1;

            $advertisement->save();
            $user->ads_rise--;
            $user->save();
        }
        \Session::flash('message', 'Ваше объявление поднято.');
        return Redirect::back();
    }

    /**
     * Show the form for creating a new resource.
     * GET /ads/create
     *
     * @return Response
     */
    public function create()
    {
        $attachments = AdsAttachment::where('hash', Session::get('advertisements_hash'))->get();
        return view('ads.create', [
            'attachments' => $attachments
        ]);

    }

    /**
     * Store a newly created resource in storage.
     * POST /ads/upload
     *
     * @return Response
     */
    public function store(Request $request)
    {

        //dd(\Request::input('editor1'));
        if (!Session::has('advertisements_hash')) {
            Session::put('advertisements_hash', md5(time()));
        }

        return Response::json([
            'attachment' => ImageUploadFacade::attachmentUpload($request->file('upl'), new AdsAttachment, 'advertisements', true),
        ]);

    }

    public function getNew(Advertisement $advertisement)
    {
        $lastId = (Input::get('last_id')) ? Input::get('last_id') : '1';
        $ads = $advertisement::approved()
            ->with('city')
            ->with('ads_attachment')
            ->with('category')
            ->with('user')->where('id', '>', $lastId )->orderBy('id', 'desc')->get();
        return \Response::json(['ads' => $ads]);
    }

    /**
     * Upload files
     */
    public function upload()
    {

    }

    /**
     * Display the specified resource.
     * GET /ads/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show(Advertisement $ads)
    {
        // $ad = $ads::with('user')->with('profile')->with('category')->with('ads_attachment')->where('id', $id)->get();
        return view('ads.show', ['ads' => $ads]);//->nest('child','task.index');
    }

    /**
     * Show the form for editing the specified resource.
     * GET /ads/{id}/edit
     *
     *
     * @param Advertisement $advertisement
     * @return \Illuminate\View\View
     */
    public function edit(Advertisement $advertisement)
    {
        return view('ads.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /ads/{id}
     *
     * @param Advertisement $advertisement
     * @param AdvertisementRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Advertisement $advertisement, AdvertisementRequest $request)
    {
        $advertisement->update($request->input());

        return redirect()->action('AdsController@my');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /ads/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        \Session::flash('message', 'Объявление удалено.');
        return redirect()->back();
    }

    /**
     * Insert advertisement to database
     */
    public function flush(AdvertisementRequest $request)
    {
        // flag top = 0 into all ads, and flag = 1 in last ad
        $ads_top = Advertisement::where('top', '=', 1)->get();

        foreach($ads_top as $at) {
            $at->top = 0;
            $at->update();
        }

        $hash = Session::get('advertisements_hash');
        $attachmentsNames = AdsAttachment::where('hash', $hash )->get()->toArray();
        $ads = new Advertisement;
        $ads->fill($request->all());
        $ads->user_id = Auth::user()->id;
        $ads->city_id = Auth::user()->profile->city_id;
        $ads->attachment_hash = $hash;
        $ads->top = 1;
        $ads->save();
        Session::forget('advertisements_hash');

        foreach ($attachmentsNames as $attachments => $attachment) {
            AdsAttachment::where('id', $attachment['id'])->update(['comment' => Input::get($attachment['id'])]);
        }
        return Redirect::to('/');


    }

    public function getRaising(Request $request)
    {
        //writing transaction
        $payment = new Payment();
        $payment->uid = mt_rand();
        $payment->user_id = $request->user()->id;
        $payment->description = 'Плата за поднятие';
        $payment->balance = $request->input('rise_count') * 10;
        $payment->operation = '-';
        $payment->save();

        //check
        if($request->input('rise_count') >= 30){

            if ($request->user()->balance < $request->input('rise_count') * 10)
            {
                \Session::flash('message', 'Недостаточно средств, пожалуйста пополните баланс.');
            }
            else
            {
                $payment->status = 1;
                $payment->save();
                $modifyBalanceToUser = User::find($request->user()->id);
                $rises = $request->input('rise_count');
                $modifyBalanceToUser->balance -= $rises * 10;
                $modifyBalanceToUser->balance += 100;
                $modifyBalanceToUser->ads_rise += $rises;
                $modifyBalanceToUser->update();
                \Session::flash('message', "Вы купили $rises поднятий.");
            }
        }

        elseif($request->input('rise_count') != null && $request->input('rise_count') != 0 )
        {
            if ($request->user()->balance < $request->input('rise_count') * 10)
            {
                \Session::flash('message', 'Недостаточно средств, пожалуйста пополните баланс.');
            }
            else
            {
                $payment->status = 1;
                $payment->save();
                $modifyBalanceToUser = User::find($request->user()->id);
                $rises = $request->input('rise_count');
                $modifyBalanceToUser->balance -= $rises * 10;
                $modifyBalanceToUser->ads_rise += $rises;
                $modifyBalanceToUser->update();
                \Session::flash('message', "Вы купили $rises поднятий.");
            }
        }
        return redirect()->back();
    }

    /**
     * @POST("/ads/{ads}/unpublish", middleware="auth", as="ads.unpublish")
     */
    public function unpublish(Advertisement $advertisement)
    {
        $advertisement->approved = 0;
        $advertisement->update();
        \Session::flash('message', 'Убрано с публикации.');
        return redirect()->back();
    }

}
