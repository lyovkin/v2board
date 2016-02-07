<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ShopCategories;
use Illuminate\Http\Request;

class AdminShopCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$types = ShopCategories::orderBy('id', 'desc')->paginate(10);

		return view('admin.shop_category.index', compact('types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param ShopCategories $type
	 * @return Response
	 */
	public function create(ShopCategories $type)
	{
		return view('admin.shop_category.create', compact('type'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$category = new ShopCategories();
		$category->fill($request->all());
		$category->save();
		return redirect()->route('admin.catshop.store');

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
	 * @param $id
	 * @return Response
	 * @internal param ShopCategories $type
	 * @internal param int $id
	 */
	public function edit($id)
	{
		$type = ShopCategories::findOrFail($id);
		return view('admin.shop_category.edit', compact('type'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param $id
	 * @param Request $request
	 * @return Response
	 * @internal param ShopCategories $categories
	 * @internal param int $id
	 */
	public function update($id, Request $request)
	{
		$categories = ShopCategories::findOrFail($id);
		$categories->fill($request->all());
		$categories->update();
		return redirect()->route('admin.catshop.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ShopCategories::findOrFail($id)->delete();
		return redirect()->back();
	}

}
