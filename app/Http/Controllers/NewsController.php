<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use ZaWeb\Core\Controllers\AbstractController;
use ZaWeb\News\Models\News;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class NewsController extends AbstractController
{


    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(5);
        return view('news.news', ['news' => $news]);//->nest('child','task.index');
    }

    public function getArticle($article)
    {
        $news = News::find($article);
        return view('news.single.single', ['article' => $news]);


    }

    public function create()
    {
        $categories = Category::get()->lists('title', 'id');
        return view('news.create', ['categories' => $categories]);
    }

    public function flush()
    {

        $article = new News();
        $article->title = Input::get('title');
        $article->text = Input::get('text');
        $article->categorie_id = Input::get('category');
        $article->user_id = Auth::id();
        $article->save();
        return redirect('/news');

    }

}
