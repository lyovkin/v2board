<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Attachment;
use App\Models\ItemsCategory;
use App\Models\ShopCategories;
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
        $user_shops = Shops::with('profile')->where('user_id', \Auth::user()->id)->get()->toArray();

        return view('upload_vk_items.index', compact('user_shops'));
    }

    /**
     * @GET("/get_user_shops")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function get_user_shops()
    {
        $user_shops = \Session::get('shop_id');

        return response()->json($user_shops);
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
        //\Session::set('shop_id', $request->input('shop_id'));
    }

    /**
     * @POST("/uploading_data")
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploading_data(Request $request)
    {

        $photos = $request->input('photos');
        $category_id = $request->input('category_id');

        if ($request->input('shop_id')) {
            $shop_id = $request->input('shop_id');

            $shop = Shops::find($shop_id);

                if ($shop && !$shop->canAddItem()) {
                    return redirect()->route('shops.my');
                }
            foreach ($photos as $photo) {
                foreach ($photo['items'] as $item) {
                    $attachment = new Attachment();
                    $attachment->name = $item['album_id'];
                    $attachment->path = $item['photo_604'];
                    $attachment->url = $item['photo_604'];
                    $attachment->save();

                    $shop_item = new ShopItems();
                    $shop_item->name = 'Название';
                    $shop_item->description = $item['text'];
                    $shop_item->shop_id = $shop_id;
                    $shop_item->category_id = $category_id;

                    if ($attachment) {
                        $shop_item->attachment()->associate($attachment);
                    }

                    $shop_item->save();
                }
            }
        }
    }

    /**
     * @GET("/get_user_categories")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function get_categories()
    {
        $shop_id = \Session::get('shop_id');

        $categories = \DB::table('items_category')
            ->join('categories_shops', 'items_category.id', '=', 'categories_shops.category_id')
            ->select('items_category.id', 'items_category.name')
            ->where('shop_id', $shop_id)
            ->get();

        return response()->json($categories);
    }

}
