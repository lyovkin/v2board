<?php namespace App\Http\Controllers\AdminControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminStaticPageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pages = StaticPage::orderBy('id', 'desc')->paginate(10);

        return view('admin.page.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(StaticPage $page)
	{
        return view('admin.page.create', ['page' => $page]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StaticPage $page, Requests\StaticPageRequest $request)
	{
		$page->create($request->input());
        Session::flash('message', 'Страница создана');
        return redirect()->route('admin.page.index');
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
	public function edit(StaticPage $page)
	{
		return view('admin.page.edit', ['page' => $page]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StaticPage $page, Requests\StaticPageRequest $request)
	{
		$page->update($request->input());
        Session::flash('message', 'Страница обновлена');
        return redirect()->route('admin.page.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(StaticPage $page)
	{
		$page->delete();
        Session::flash('message', 'Страница удалена');
        return redirect()->route('admin.page.index');
	}

}
