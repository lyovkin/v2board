<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AdType;
use Illuminate\Http\Request;

class AdminTypesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $types = AdType::orderBy('id', 'desc')->paginate(10);
        return view('admin.type.index', ['types' => $types]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(AdType $type)
	{
        return view('admin.type.create', ['type' => $type]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdType $type, Requests\TypeRequest $request)
	{
        $type->create($request->all());
        \Session::flash('message', 'Тип обьявления создан');
        return redirect()->route('admin.type.index');
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
	public function edit(AdType $type)
	{
        return view('admin.type.edit', ['type' => $type]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(AdType $type, Requests\TypeRequest $request)
	{
        $type->update($request->input());
        \Session::flash('message', 'Тип обьявления обновлен');
        return redirect()->route('admin.type.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(AdType $type)
	{
		$type->delete();
        return redirect()->route('admin.type.index');
	}

}
