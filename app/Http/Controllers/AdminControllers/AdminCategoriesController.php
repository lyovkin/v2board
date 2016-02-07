<?php
namespace App\Http\Controllers\AdminControllers;

use App\Facades\ImageUploadFacade;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Annotations\Annotations\Controller;
use ZaWeb\Core\Controllers\AbstractAdminController;
use App\Models\Attachment;
/**
 * @Resource("categories")
 * @Controller(prefix="/admin")
 * @Middleware("admin")
 */
class AdminCategoriesController extends AbstractAdminController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $categories)
    {
        return view('admin.categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Category $categories, CategoryRequest $request)
    {
        $attachment = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'categories');
        $categories->fill($request->all())->attachment()->associate($attachment);
        $categories->save();

        return redirect()->route('admin.categories.index');
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
    public function edit(Category $categories)
    {
        return view('admin.categories.edit', ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Category $categories, CategoryRequest $request)
    {
        $categories->fill($request->all());

        if ($request->file('attachment') !== null) {

            $attachment = ImageUploadFacade::attachmentUpload($request->file('attachment'), new Attachment(), 'categories', true);

            $categories->attachment()->associate($attachment);
        }

        $categories->save();

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Category $categories)
    {
        $categories->delete();
        return redirect()->route('admin.categories.index');
    }


}
