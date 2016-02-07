<?php namespace AppAdmin\Http\Controllers;

use App\Http\Requests\TagsRequest;
use App\Models\Tags;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Annotations\Annotations\Controller;
use Illuminate\Support\Facades\Session;
use ZaWeb\Core\Controllers\AbstractAdminController;

/**
 * @Resource("tags")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */
class AdminTagsController extends AbstractAdminController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::orderBy('id', 'desc')->paginate(5);
        return view('admin.tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Tags $tags)
    {
        return view('admin.tags.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Tags $tags, TagsRequest $request)
    {
        $tags->create($request->all());
        return redirect()->route('admin.tags.index');
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
    public function edit(Tags $tags)
    {
        return view('admin.tags.edit', ['tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Tags $tags, TagsRequest $request)
    {
        $tags->update($request->input());
        Session::flash('message','Тег обновлён');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Tags $tags)
    {
        $tags->delete();
        return redirect()->route('admin.tags.index');
    }


}
