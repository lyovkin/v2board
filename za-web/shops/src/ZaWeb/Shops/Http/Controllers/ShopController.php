<?php

namespace ZaWeb\Shops\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Attachment;
use App\Models\ShopCategories;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use ZaWeb\Shops\Models\ShopItems;
use ZaWeb\Shops\Models\ShopProfile;
use ZaWeb\Shops\Models\Shops;
use Illuminate\Support\Facades\Auth;
use ZaWeb\Shops\Http\Requests\ShopRequest;
use App\Facades\ImageUploadFacade;

/**
 * @Resource("shops")
 */
class ShopController extends Controller
{

    protected $req;

    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user() && Auth::user()->profile->city_id != null) {
            $shops = Shops::where('blocked', 0)
                ->where('paid_at', '>=', new \DateTime('today'))
                ->where('city_id', '=', Auth::user()->profile->city_id)
                ->orderBy('id', 'desc')
                ->paginate(5);

            return view('shops::index', compact('shops'));
        }
        $shops = Shops::where('blocked', 0)
            ->where('paid_at', '>=', new \DateTime('today'))
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('shops::index', compact('shops'));
    }

    /**
     * @Get("/shops/my", middleware="auth", as="shops.my")
     */
    public function my()
    {
        $shops = Shops::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('shops::index', compact('shops'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @Middleware("auth")
     */
    public function create(Shops $shop)
    {
        return view('shops::create', compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShopRequest $request)
    {
       // dd($request->input('category'));
        // 2000 items
        if (\Request::input('capacity') == 2000) {
            // Create transaction
            $payment = new Payment();
            $payment->uid = mt_rand();
            $payment->user_id = Auth::user()->id;
            $payment->description = 'Покупка магазина на 2000 товаров';
            $payment->balance = 1000;
            $payment->operation = '-';
            $payment->save();

            // Check balance
            if (Auth::user()->balance < 1000) {
                \Session::flash('message', 'Недостаточно средств для покупки магазина, пожалуйста пополните баланс.');
                return redirect()->back();
            } // if OK
            else {
                // Create shop
                $attachment = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'shops');

                $shop = new Shops();
                $shop->capacity = $request->get('capacity');
                $shop->city_id = $request->get('city');
                $shop->category_id = $request->input('category');
                $shop->paid_at = Carbon::now()->addMonth();
                $shopProfile = new ShopProfile();
                $shopProfile->fill($request->except('attachment'));
                $shopProfile->save();
                $shop->profile()->associate($shopProfile);

                if ($attachment) {
                    $shop->attachment()->associate($attachment);
                }

                $shop->user()->associate(Auth::user());
                $shop->save();

                // Update transaction and balance user
                $payment->status = 1;
                $payment->save();
                $modifyBalanceToUser = User::find(\Auth::user()->id);
                $modifyBalanceToUser->balance -= 1000;
                $modifyBalanceToUser->update();

                \Session::flash('message', "Вы купили магазин на 2000 товаров. Спасибо за покупку ;)");
            }

            return redirect()->route('shops.my');
        }
        // 500 items
        if (\Request::input('capacity') == 500) {
            // Create transaction
            $payment = new Payment();
            $payment->uid = mt_rand();
            $payment->user_id = Auth::user()->id;
            $payment->description = 'Покупка магазина на 500 товаров';
            $payment->balance = 500;
            $payment->operation = '-';
            $payment->save();

            // Check balance
            if (Auth::user()->balance < 500) {
                \Session::flash('message', 'Недостаточно средств для покупки магазина, пожалуйста пополните баланс.');
                return redirect()->back();
            } // if OK
            else {
                // Create shop
                $attachment = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'shops');

                $shop = new Shops();
                $shop->capacity = $request->get('capacity');
                $shop->city_id = $request->get('city');
                $shop->category_id = $request->input('category');
                $shop->paid_at = Carbon::now()->addMonth();
                $shopProfile = new ShopProfile();
                $shopProfile->fill($request->except('attachment'));
                $shopProfile->save();
                $shop->profile()->associate($shopProfile);

                if ($attachment) {
                    $shop->attachment()->associate($attachment);
                }

                $shop->user()->associate(Auth::user());
                $shop->save();

                // Update transaction and balance user
                $payment->status = 1;
                $payment->save();
                $modifyBalanceToUser = User::find(\Auth::user()->id);
                $modifyBalanceToUser->balance -= 500;
                $modifyBalanceToUser->update();

                \Session::flash('message', "Вы купили магазин на 500 товаров. Спасибо за покупку ;)");
            }

            return redirect()->route('shops.my');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Shops $shops
     * @return Response
     * @internal param int $id
     * @internal param int $shop_id
     */
    public function show(Shops $shops)
    {
        $items = ShopItems::with('shop')
            ->where('shop_id', '=', $shops->id)
            ->paginate(20);

        $shop_id = Shops::where('id', $shops->id)->first()->id;

        $categories = \DB::select("select cat.name, cat.id
                                      from categories_shops d
                                      join shops m on d.shop_id = m.id
                             		  join items_category cat on d.category_id = cat.id
                             		  where m.id = $shop_id");

        \Session::set('shop_id', $shop_id);

        return view('shops::show', compact('shops', 'items', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shops $shops
     * @return Response
     * @internal param int $id
     */
    public function edit(Shops $shops)
    {
        if (Auth::check()) {
            if ($shops->user_id != Auth::user()->id) {
                return redirect('/');
            }
        }

        $shop = Shops::with('profile', 'attachment')->where('id', $shops->id)->first();
        return view('shops::edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ShopRequest $request
     * @param Shops $shops
     * @return Response
     * @internal param int $id
     */
    public function update(ShopRequest $request, Shops $shops)
    {
        if (Auth::check()) {
            if ($shops->user_id != Auth::user()->id) {
                return redirect('/');
            }
        }
        ShopProfile::find($shops->profile_id)->update($request->except('attachment')['profile']);
        if ($request->file('attachment')) {
            $attachment = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'shops');
            $shops->fill($request->only('attachment'));
            $shops->attachment()->associate($attachment);
        }

        $shops->city_id = $request->get('city');
        $shops->update();

        return redirect()->route('shops.show', $shops->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Shops::first($id)->delete();

        return \Response::json([
            'error' => 'false',
            'message' => 'Shop deleted'
        ], 200);
    }

    /**
     * @POST("/shops/{shops}/extend", middleware="auth", as="shops.extend")
     */
    public function extend(Request $request, Shops $shop)
    {
        $months = (int) $request->get('months');
        // 500 items
        if ($shop->capacity == 500) {
            // Create transaction
            $payment = new Payment();
            $payment->uid = mt_rand();
            $payment->user_id = Auth::user()->id;
            $payment->description = "Продление магазина на 500 товаров на $months мес.";
            $payment->balance = 500 * $months;
            $payment->operation = '-';
            $payment->save();

            // Check balance
            if (Auth::user()->balance < 500 * $months) {
                \Session::flash('message', 'Недостаточно средств для продления магазина, пожалуйста пополните баланс.');
                return redirect()->route('shops.my');
            } // if OK
            else {
                // Update shop
                $shop->paid_at = Carbon::now()->addMonths($months);
                $shop->update();

                // Update transaction and balance user
                $payment->status = 1;
                $payment->save();
                $modifyBalanceToUser = User::find(\Auth::user()->id);
                $modifyBalanceToUser->balance -= 500 * $months;
                $modifyBalanceToUser->update();

                \Session::flash('message', "Вы продлили магазин на 500 товаров на $months мес. Спасибо за покупку ;)");
            }
            return redirect()->route('shops.my');
        }
        // 2000 items
        if ($shop->capacity == 2000) {
            // Create transaction
            $payment = new Payment();
            $payment->uid = mt_rand();
            $payment->user_id = Auth::user()->id;
            $payment->description = "Продление магазина на 2000 товаров на $months мес.";
            $payment->balance = 1000 * $months;
            $payment->operation = '-';
            $payment->save();

            // Check balance
            if (Auth::user()->balance < 1000 * $months) {
                \Session::flash('message', 'Недостаточно средств для продления магазина, пожалуйста пополните баланс.');
                return redirect()->route('shops.my');;
            } // if OK
            else {
                // Create shop
                $shop->paid_at = Carbon::now()->addMonths($months);
                $shop->update();

                // Update transaction and balance user
                $payment->status = 1;
                $payment->save();
                $modifyBalanceToUser = User::find(\Auth::user()->id);
                $modifyBalanceToUser->balance -= 1000 * $months;
                $modifyBalanceToUser->update();

                \Session::flash('message', "Вы продлили магазин на 2000 товаров на $months мес. Спасибо за покупку ;)");
            }

            return redirect()->route('shops.my');
        }

        return redirect()->route('shops.my');
    }

    /**
     * @POST("/filtered/{shops}", middleware="auth", as="shops.filtered")
     * @internal param Request $request
     * @param Shops $shops
     * @return \Illuminate\View\View
     */
    public function filterItems(Shops $shops)
    {
        if (\Request::input('cat_id') == 0) {
            $items = ShopItems::with('shop')
                ->where('shop_id', '=', $shops->id)
                ->paginate(20);
        } else {
            $items = ShopItems::with('shop')
                ->where('shop_id', '=', $shops->id)
                ->where('category_id', \Request::input('cat_id'))
                ->paginate(20);
        }

        $shop_id = Shops::where('id', $shops->id)->first()->id;

        $categories = \DB::select("select cat.name, cat.id
                                      from categories_shops d
                                      join shops m on d.shop_id = m.id
                             		  join items_category cat on d.category_id = cat.id
                             		  where m.id = $shop_id");

        return view('shops::show', compact('shops', 'items', 'categories'));
    }

    /**
     * @GET("shops/{shops}/mass_upload", middleware="auth")
     * @param Shops $shops
     * @return \Illuminate\View\View
     */
    public function massUpload(Shops $shops)
    {
        $categories = ShopCategories::getShopCategories($shops->id);

        //\Session::put('s_id', $shops->id);

        return view('shops::mass_upload', compact('shops', 'categories'));
    }

    /**
     * @POST("shops/get_photos", middleware="auth")
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getPhotos(Request $request)
    {
        if($request->s_id) {

            $shop_id = $request->s_id;
            \Session::put('shop_id', $shop_id);

        } else {

            $s_id = \Session::get('shop_id');

            $shop = Shops::find($s_id);

            if ($shop && !$shop->canAddItem()) {
                return redirect()->route('shops.my');
            }

            $file = ImageUploadFacade::attachmentUpload($request->file("file"), new Attachment(), 'shop_items');

            $item = new ShopItems();
            $item->name = 'Название';
            $item->description = 'Описание';
            $item->shop_id = $s_id;

            if ($file) {
                $item->attachment()->associate($file);
            }

            $item->save();
        }

        //return redirect()->route('shops.show', ['id'=>$request->id]);
    }
}
