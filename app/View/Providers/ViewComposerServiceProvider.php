<?php

namespace App\View\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        View::composer(['layouts.app', 'layouts.app2', 'm_layouts.app'], 'ZaLaravel\LaravelNavigation\Composers\NavigationComposer');

		/*
		 * Shops categories
		 */
		View::composer('shops::index', 'App\View\Composers\ShopCategoryComposer');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
