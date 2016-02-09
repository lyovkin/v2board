<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ShopCategories;
use Illuminate\Http\Request;
use ZaWeb\Shops\Models\Shops;

class ShopCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*$links = ShopCategories::all();
		return view('shops::index', compact('links'));*/
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\View\View
	 */
	public function filter(Request $request)
	{
		$shops = Shops::where('category_id', $request->input('id'))
			->where('blocked', 0)
			->where('paid_at', '>=', new \DateTime('today'))
			->orderBy('id', 'desc')
			->paginate(5);

		return view('shops::index', compact('shops'))->with('category', $request->input('id'));
	}

}
