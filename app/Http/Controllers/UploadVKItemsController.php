<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Attachment;
use App\Models\User;
use Illuminate\Http\Request;
use ZaWeb\Shops\Models\ShopItems;
use ZaWeb\Shops\Models\Shops;

/**
 * Class UploadVKItemsController
 * @package App\Http\Controllers
 * @Middleware("auth")
 */
class UploadVKItemsController extends Controller {

    /**
     * @GET("/upload_vk_items")
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user_shops = User::getUserShops();

        return view('upload_vk_items.index', compact('user_shops'));
    }

    /**
     * @POST("/upload_vk_items")
     * @param Request $request
     */
    public function getAlbumId(Request $request)
    {
        \Session::set('album_id', $request->input('album_id'));
        \Session::set('user_id', $request->input('user_id'));
        \Session::set('access_token', $request->input('access_token'));
    }

    /**
     * @POST("/uploading_data")
     * @param Request $request
     */
    public function uploading_data(Request $request)
    {
        $user_id = \Session::get('user_id');
        $album_id = \Session::get('album_id');
        $access_token = \Session::get('access_token');

        $photos_raw = file_get_contents('https://api.vk.com/method/photos.get?owner_id='.$user_id.'&album_id='.$album_id.
            '&access_token='.$access_token);

        $photos = json_decode($photos_raw, true);
        dd($photos);

        if ($request->input('shop_id')) {
            $shop_id = $request->input('shop_id');

            $shop = Shops::find($shop_id);

                if ($shop && !$shop->canAddItem()) {
                    return redirect()->route('shops.my');
                }
            foreach ($photos as $photo) {
                foreach ($photo as $item) {
                    $attachment = new Attachment();
                    $attachment->name = $item['aid'];
                    $attachment->path = $item['src_xbig'];
                    $attachment->url = $item['src_xbig'];
                    $attachment->save();

                    $shop_item = new ShopItems();
                    $shop_item->name = 'Название';
                    $shop_item->description = $item['text'];
                    $shop_item->shop_id = $shop_id;

                    if ($attachment) {
                        $shop_item->attachment()->associate($attachment);
                    }

                    $shop_item->save();
                }
            }
        }

        //dd(json_decode($photos, true));
    }

}
