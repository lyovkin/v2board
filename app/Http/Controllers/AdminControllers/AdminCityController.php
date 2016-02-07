<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cities;
use Illuminate\Http\Request;
use ZaWeb\Core\Controllers\AbstractController;

/**
 * Class AdminCityController
 * @package App\Http\Controllers\AdminControllers
 */
class AdminCityController extends AbstractController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities = Cities::orderBy('id', 'desc')->paginate(5);
        return view('admin.cities.index', compact('cities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Cities $cities)
	{
        return view('admin.cities.create', compact('cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Cities $cities, Request $request)
	{
        $cities->create($request->all());
        return redirect()->route('admin.city.index');
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
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $cities = Cities::find($id);
        return view('admin.cities.edit', compact('cities'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\CityRequest $request)
	{
        $cities = Cities::findOrFail($id);
        $cities->city_name = \Input::get('city_name');
        $cities->save();
        \Session::flash('message','Город обновлён');
        return redirect()->route('admin.city.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cities::find($id)->delete();
        return redirect()->back();
	}

}
