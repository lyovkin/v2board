<?php

namespace App\Http\Controllers;
use App\Models\AdType;
use App\Models\Special;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use ZaWeb\Core\Controllers\AbstractController;
use App\Models\Advertisement;
use App\Models\Cities;
use App\Models\Category;
use Illuminate\Support\Facades\View;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends AbstractController
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Advertisement $advertisement
     * @param Request $request
     * @return mixed
     */
    public function index(Advertisement $advertisement, Request $request)
    {
        $ads = $advertisement::orderBy('top', 'desc')
            ->orderBy('id', 'desc');

        $input = \Input::all();

        if($request->input('search')) {
            $ads = $advertisement->where('text', 'LIKE', '%'.$request->input('search').'%')->orderBy('top', 'desc')->orderBy('id', 'desc');
        }

        if($request->input('category_id')) {
            if ($input['category_id'] != 'null') {
                $category = Category::findOrFail(\Input::get('category_id'));
                $ads = Advertisement::with('category')
                   // ->approved()
                    ->where('category_id', '=', $category->id)->orderBy('top', 'desc')->orderBy('id', 'desc');
            }
        }

        if($request->input('city_id')) {
            if ($input['city_id'] != 'null' ){
                $city = Cities::findOrFail(\Input::get('city_id'));
                $ads = Advertisement::with('city')
                   // ->approved()
                    ->where('city_id', '=', $city->id)->orderBy('top', 'desc')->orderBy('id', 'desc');
            }
        }

        if($request->input('type_id')) {
            if ($input['type_id'] != 'null') {
                $type = AdType::findOrFail(\Input::get('type_id'));
                $ads = Advertisement::with('type')
                   // ->approved()
                    ->where('type_id', '=', $type->id)->orderBy('top', 'desc')->orderBy('id', 'desc');
            }
        }

        if($request->input('category_id') && $request->input('type_id')) {
            if ($input['category_id'] != 'null' && $input['type_id'] != 'null') {
                $category = Category::findOrFail(\Input::get('category_id'));
                $type = AdType::findOrFail(\Input::get('type_id'));
                $ads = Advertisement::with('category')
                    ->with('type')
                   // ->approved()
                    ->where('category_id', '=', $category->id)
                    ->where('type_id', '=', $type->id)->orderBy('top', 'desc')->orderBy('id', 'desc');
            }
        }

        if($request->input('city_id') && $request->input('category_id')) {
            if ($input['category_id'] != 'null' && $input['city_id'] != 'null') {
                $category = Category::findOrFail(\Input::get('category_id'));
                $city = Cities::findOrFail(\Input::get('city_id'));
                $ads = Advertisement::with('city')
                    ->with('category')
                   // ->approved()
                    ->where('city_id', '=', $city->id)
                    ->where('category_id', '=', $category->id)->orderBy('top', 'desc')->orderBy('id', 'desc');
            }
        }

        if($request->input('city_id') && $request->input('type_id')) {
            if ($input['city_id'] != 'null' && $input['type_id'] != 'null') {
                $city = Cities::findOrFail(\Input::get('city_id'));
                $type = AdType::findOrFail(\Input::get('type_id'));
                $ads = Advertisement::with('city')
                    ->with('type')
                   // ->approved()
                    ->where('city_id', '=', $city->id)
                    ->where('type_id', '=', $type->id)->orderBy('top', 'desc')->orderBy('id', 'desc');
            }
        }

        if($request->input('city_id') && $request->input('category_id') && $request->input('type_id')) {
            if ($input['category_id'] != 'null' && $input['city_id'] != 'null' && $input['type_id'] != 'null') {
                $category = Category::findOrFail(\Input::get('category_id'));
                $city = Cities::findOrFail(\Input::get('city_id'));
                $type = AdType::findOrFail(\Input::get('type_id'));
                $ads = Advertisement::with('city')
                    ->with('category')
                    ->with('type')
                   // ->approved()
                    ->where('city_id', '=', $city->id)
                    ->where('category_id', '=', $category->id)
                    ->where('type_id', '=', $type->id)->orderBy('top', 'desc')->orderBy('id', 'desc');
            }
        }

        if($_SERVER['HTTP_HOST'] == env('HOST'))
        {
            $ads = $ads->paginate(10);
        }else
        {
            $ads = $ads->paginate(20);
        }

        return View::make('welcome', compact('ads'))->with('input', \Input::all());

    }
    public function getNew(Advertisement $advertisement)
    {
       // $ads = $advertisement->approved()->orderBy('created_at', 'desc')->orderBy('top', 'desc');
        $ads = $advertisement::orderBy('created_at', 'desc')->orderBy('top', 'desc');
        if($_SERVER['HTTP_HOST'] == env('HOST'))
        {
            $ads = $ads->paginate(10);
        }else
        {
            $ads = $ads->paginate(20);
        }

        return View::make('welcome', compact('ads'));
    }

}
