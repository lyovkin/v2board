<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\UsefulLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsefulLinkController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $links = UsefulLink::orderBy('id', 'desc')->paginate(10);
        return view('admin.useful_links.index', ['links' => $links]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(UsefulLink $link)
	{
        return view('admin.useful_links.create', ['link' => $link]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UsefulLink $link, Requests\UsefulLinkRequest $request)
	{
		$link->create($request->all());
        Session::flash('message', 'Полезная ссылка создана');
        return redirect()->route('admin.useful-link.index');
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
	public function edit(UsefulLink $link)
	{
		return view('admin.useful_links.edit', ['link' => $link]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UsefulLink $link, Requests\UsefulLinkRequest $request)
	{
		$link->update($request->input());
        Session::flash('message', 'Полезная ссылка обновлена');
        return redirect()->route('admin.useful-link.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(UsefulLink $link)
	{
		$link->delete();
        return redirect()->route('admin.useful-link.index');
	}

}
