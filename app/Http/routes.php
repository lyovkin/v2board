<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'welcome', 'uses' => 'WelcomeController@index'));
Route::get('/new', array('as' => 'welcome.new', 'uses' => 'WelcomeController@getNew'));

$router->get('/home', 'HomeController@index');

//$router->get('/ads', 'AdsController@index');

$router->get('/news', [
    'uses' => 'NewsController@index',
    'as' => 'news.index',
    'middleware' => ['guest']
]);

$router->get('/news/{article}', 'NewsController@getArticle');

$router->get('/create/news', [
    'uses' => 'NewsController@create',
    'as' => 'news.create',
    'middleware' => ['admin']
]);

/**
 * Payment
 */

Route::post('/createPayment', 'PaymentController@createPayment');

Route::post('/getRaise', 'AdsController@getRaising');
/**
 * Advertisement
 */
Route::model('ads', 'App\\Models\\Advertisement');

$router->get('/getNewAds', 'AdsController@getNew');
$router->get('/ads/create', [
    'middleware' => 'auth',
    'uses' => 'AdsController@create'
 ]);

$router->post('/ads/upload', [
    'uses' => 'AdsController@store',
]);
/**
 * Categories
 */
Route::resource('category', 'CategoriesController');//->

/**
 * Paid Service
 */

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('paidservices', 'PaidServicesController');
    Route::get('balance', 'PaidServicesController@balance');
    Route::get('rise', 'PaidServicesController@rise');
});

/*
 * Shop categories routes
 */
Route::get('shops_category', 'ShopCategoriesController@index');
Route::post('shops_category', 'ShopCategoriesController@filter');

//Route::get('shops/{id}/mass_upload', 'ZaWeb\Shops\Http\Controllers\ShopController@massUpload');

/*
 * Items category
 */
Route::resource('items_category', 'ItemsCategoryController');
Route::post('getShop', [
        'uses' =>'ItemsCategoryController@getShop',
        'as' => 'getShop'
]);

$router->post('/ads/flush', 'AdsController@flush');


$router->post('/questions/flush', 'QuestionsController@flush');
$router->post('/questions/upload', 'QuestionsController@store');
$router->post('/questions/{id}', 'QuestionsController@show');

$router->bind('pagename', function ($id) {
    return \AppAdmin\Models\PageName::find($id);
});

$router->bind('categories', function ($id) {
    return \App\Models\Category::find($id);
});

$router->bind('tags', function ($id) {
    return \App\Models\Tags::find($id);
});

$router->bind('ads', function ($id) {
    return \App\Models\Advertisement::find($id);
});

$router->bind('country', function ($title) {
    return \App\Models\Country::where('title', '=', $title)->first();
});

/**
 * PROFILE
 */

$router->bind('profile', function ($user_name ) {

    $user = \App\Models\User::where('user_name', $user_name)->first();
    if(!$user)
    {
        $user = \App\Models\User::where('user_name', Auth::user()->user_name)->first();
    }
    return \ZaWeb\Profile\Models\Profile::where('user_id', $user->id)->first();
});

/**
 * COMMENTS
 */
Route::model('comments', 'App\\Models\\Comments');//->
Route::resource('comments', 'CommentsController');//->

$router->bind('comments', function ($ads_id) {
    return \App\Models\Comments::where('ads_id', 21)->first();
});

/**
 * Services
 */

Route::resource('services', 'ServicesController');

/**
 *
 * Static page
 */

$router->get('/page/{spage}', [
    'uses' =>'StaticPageController@index',
    'as' => 'static-page'
]);
$router->bind('spage', function($slug){
    return \App\Models\StaticPage::where('slug', '=', $slug)->firstOrFail();
});

/**
 *
 * Gallery
 */
$router->get('/gallery/{gslug}', [
    'uses' =>'GalleryController@index',
    'as' => 'gallery.index'
]);

$router->bind('gslug', function($slug){
    return \App\Models\Gallery::where('slug', '=', $slug)->firstOrFail();
});



/** ADMIN */

$router->get('/admin', function () {
    return \Illuminate\Support\Facades\Redirect::route('admin.dashboard.index');
});


$router->bind('banner', function ($id) {
    return App\Models\Banner::find($id);
});

$router->bind('services', function ($id) {
    return App\Models\Services::find($id);
});

Route::get('/ipn','ZaLaravel\LaravelPayeer\Controllers\IpnPayeerController@getResult');

$router->group(['namespace' => 'AdminControllers', 'prefix' => 'admin', 'middleware' => 'admin'], function ($router) {

    Route::resource('catshop', 'AdminShopCategoriesController');

    Route::resource('shops', 'AdminShopsController');

    Route::post('shops/{shop}/block', [
        'uses' => 'AdminShopsController@block',
        'as' => 'admin.shop.block',
    ]);

    /**
     * modify routes
     */

    Route::get('/user/{user}/addShop',
        array('uses' => 'AdminModifyController@createShop',
               'as' => 'admin.user.addshop'));

    Route::get('/user/{user}/addBalance',
        array('uses' => 'AdminModifyController@createBalance',
            'as' => 'admin.user.addmoney'));

    Route::post('/user/storeBalance',
        array('uses' => 'AdminModifyController@storeBalance',
            'as' => 'admin.user.storebalance'));

    Route::post('/user/storeShop',
        array('uses' => 'AdminModifyController@storeShop',
            'as' => 'admin.user.storeshop'));


    Route::resource('services', 'AdminServicesController');

    Route::get('transactions', ['uses' => 'TransactionController@showAllTransaction', 'as' => 'admin.transactions.index']);

    Route::resource('dashboard', 'AdminController');

    Route::resource('city', 'AdminCityController');

    Route::model('advertisement', 'App\\Models\\Advertisement');
    Route::resource('advertisement', 'AdminAdvertisementController');//->

    //Route::model('banner', 'App\\Models\\Banner');
    //Route::resource('banner', 'AdminBannerController');//->

    Route::resource('categories', 'AdminCategoriesController');

    Route::resource('pagename', 'PageNameController');
    Route::resource('tags', 'AdminTagsController');

    Route::resource('useful-link', 'AdminUsefulLinkController');
    Route::model('useful-link', 'App\\Models\\UsefulLink');

    Route::resource('page', 'AdminStaticPageController');
    Route::model('page', 'App\\Models\\StaticPage');

    //Route::controller('approve', 'AdminApproveController');
    Route::get('approve', ['as' => 'admin.approve.index', 'uses' => 'AdminApproveController@index']);
    Route::get('approve/{ads}', ['as' => 'admin.approve.approve', 'uses' => 'AdminApproveController@approve']);

    Route::model('user', 'App\\Models\\User');
    Route::resource('user', 'AdminUserController');

    Route::model('type', 'App\\Models\\AdType');
    Route::resource('type', 'AdminTypesController');

    Route::post('user/{user}/block', [
        'uses' => 'AdminUserController@block',
        'as' => 'admin.user.block',
    ]);

    Route::post('user/filter', 'AdminUserController@filter');

    Route::post('advertisement/mass-remove', 'AdminAdvertisementController@massRemove');
    Route::post('advertisement/mass-approve', 'AdminAdvertisementController@massApprove');
});

/** end */

/** Images */

Route::get('img/{folder}/{path}', function (League\Glide\Server $server, $folder, $path) {

    $server->setSourcePathPrefix('uploads/'.$folder);
    $server->setCachePathPrefix('uploads/.cache');
    
    $server->outputImage($path, $_GET);
});

/* End images*/


/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

$router->controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**
 * Favorites routes
 */
Route::resource('favorites', 'FavoritesController');

Route::get('/rules', 'InfoController@rules');
Route::get('/faq', 'FAQController@index');
