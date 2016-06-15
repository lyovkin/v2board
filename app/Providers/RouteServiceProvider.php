<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

    protected $scan = [
        'App\Http\Controllers\CategoriesController',
        'App\Http\Controllers\AdsController',
        'App\Http\Controllers\InfoController',
        'App\Http\Controllers\QuestionsController',
        'App\Http\Controllers\TaskController',
        'App\Http\Controllers\CountryController',
        'App\Http\Controllers\ProfileController',
        'App\Http\Controllers\LanguageController',
		'App\Http\Controllers\UploadVKItemsController',
        'AppAdmin\Http\Controllers\AdminAdvertisementController',
        'AppAdmin\Http\Controllers\AdminController',
        'AppAdmin\Http\Controllers\PageNameController',
        'AppAdmin\Http\Controllers\AdminCategoriesController',
        'AppAdmin\Http\Controllers\AdminTagsController',
        'AppAdmin\Http\Controllers\AdminApproveController',
        'AppAdmin\Http\Controllers\AdminQuestionsController',
    ];

   	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $router->model('banner', 'App\Models\Banner');
		//
	}

	/**
	 * Define the routes for the application.
	 *
	 * @return void
	 */
	public function map()
	{
		$this->loadRoutesFrom(app_path('Http/routes.php'));
	}

}
