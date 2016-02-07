<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use ZaWeb\Shops\Models\ShopProfile;
use ZaWeb\Shops\Models\Shops;
use Illuminate\Support\Facades\Auth;
use ZaWeb\Shops\Http\Requests\ShopRequest;
use App\Facades\ImageUploadFacade;
use ZaWeb\Core\Controllers\AbstractAdminController;

/**
 * Class AdminModifyController
 * @package App\Http\Controllers\AdminControllers
 */
class AdminModifyController extends AbstractAdminController {

    /**
     * @param Shops $shop
     * @return \Illuminate\View\View
     */
	public function createShop(Shops $shop, User $user)
    {
        $page = $_SERVER['HTTP_REFERER'];

        return view('admin.modify.addshop', compact('shop', 'user'))->with('page', $page);
    }

    /**
     * @param ShopRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeShop(ShopRequest $request)
    {
        $attachment = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'shops');
        $shop = new Shops();
        $shop->capacity = $request->get('capacity');
        $shop->city_id = $request->get('city');
        $shop->paid_at = Carbon::now()->addMonth();
        $shopProfile = new ShopProfile();
        $shopProfile->fill($request->except('attachment'));
        $shopProfile->save();
        $shop->profile()->associate($shopProfile);

        if ($attachment) {
            $shop->attachment()->associate($attachment);
        }

        $page = $request->page;

        $shop->user_id = $request->user_id;
        $shop->save();

        return redirect($page);
    }

    public function createBalance(User $user)
    {
        $page = $_SERVER['HTTP_REFERER'];
        return view('admin.modify.addmoney', compact('user'))->with('page', $page);
    }

    public function storeBalance(Request $request)
    {
        $page = $request->page;
        $user = User::where('id', '=', $request->user_id)->first();
        $user->balance = $request->sum;
        $user->update();

        return redirect($page);
    }

}
