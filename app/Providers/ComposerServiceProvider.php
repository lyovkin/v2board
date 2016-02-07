<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer('welcome', 'App\View\Composers\AdvComposer');
        View::composer(['favorites.index', 'ads.my', 'home'], 'App\View\Composers\AdvComposer');
        View::composer('slider.slider', 'App\View\Composers\CategoryComposer');
        View::composer('slider.slider', 'App\View\Composers\CityComposer');
        View::composer('slider.slider', 'App\View\Composers\TypeComposer');
        View::composer('slider.slide', 'App\View\Composers\SliderComposer');
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
