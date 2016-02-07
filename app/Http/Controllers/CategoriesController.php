<?php namespace App\Http\Controllers;

use App\Models\Category;
use Redirect;
use Request;
use ZaWeb\Core\Controllers\AbstractController;
use App\Models\Advertisement;
/**
 * @Resource("categories")
 * @Middleware("guest")
 */
class CategoriesController extends AbstractController
{

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
    public function store()
    {
        Category::create(Request::get());

        return Redirect::route('categories.index');
    }

    /**
     * Display the specified category.
     *
     * @param  int $id
     * @return Response
     */
    public function show($alias, Advertisement $advertisement)
    {
        $category = Category::where('alias', $alias)->first();
        $ads = $advertisement->approved()->where('category_id', $category->id)->orderBy('id', 'desc')->paginate(3);
        return view('welcome', ['ads'=>$ads]);//->nest('child','task.index');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $category = Category::findOrFail($id);

        $category->update(Request::get());

        return Redirect::route('categories.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return Redirect::route('categories.index');
    }

}
