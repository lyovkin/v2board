<?php namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\CreateComment;
use App\Handlers\Events\SendNottification;

class EventServiceProvider extends ServiceProvider {


	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],

		CreateComment::class => [
			SendNottification::class,
		]
	];

}
