<?php
namespace App\Http\Controllers\AdminControllers;

use AppAdmin\Models\PageName;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;
use ZaWeb\Core\Controllers\AbstractAdminController;

/**
 * @Resource("pagename")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */
class PageNameController extends AbstractAdminController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageNames = PageName::orderBy('id', 'desc')->paginate(5);
        return view('admin.pagename.index', ['pageNames' => $pageNames]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(PageName $pageName)
    {
        return view('admin.pagename.create', ['pageName' => $pageName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageName $pageName, Request $request)
    {
        $pageName->create($request->all());
        return redirect()->route('admin.pagename.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(PageName $pageName)
    {
        return view('admin.pagename.edit', ['pageName' => $pageName]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(PageName $pageName, Request $request)
    {
        $pageName->update($request->input());
        return redirect()->route('admin.pagename.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(PageName $pageName)
    {
        $pageName->delete();
        return redirect()->route('admin.pagename.index');
    }


}
