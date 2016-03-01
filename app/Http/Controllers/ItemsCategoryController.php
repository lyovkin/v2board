<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ItemsCategory;
use Illuminate\Http\Request;
use ZaWeb\Shops\Models\Shops;

/**
 * Class ItemsCategoryController
 * @package App\Http\Controllers
 */
class ItemsCategoryController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$cat_id = \DB::table('items_category')->insertGetId(array(
			'name' => $request->input('name'),
			'description' => $request->input('description')
		));

		\DB::table('categories_shops')->insert(array(
				'shop_id' => $request->input('shop_id'),
				'category_id' => $cat_id
		));

		$shops = Shops::where('user_id', \Auth::user()->id)->orderBy('id', 'desc')->paginate(5);

		return view('shops::index', compact('shops'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categories = $categories = \DB::select("select cat.name, cat.id
                                      from categories_shops d
                                      join shops m on d.shop_id = m.id
                             		  join items_category cat on d.category_id = cat.id
                             		  where m.id = $id");

		return view('items_category.index', compact('categories'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = ItemsCategory::find($id);

		return view('items_category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = ItemsCategory::find($id);
		$category->name = \Request::input('name');
		$category->description = \Request::input('description');
		$category->save();

		\Session::flash('message', 'Категория успешно обновлена.');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ItemsCategory::find($id)->delete();
		\Session::flash('message', 'Категория успешно удалена.');
		return redirect()->back();
	}

	public function getShop(Request $request)
	{
		$shop_id = $request->input('shop_id');

		return view('items_category.create', compact('shop_id'));
	}

}
