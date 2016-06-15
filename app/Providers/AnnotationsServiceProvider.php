<?php namespace App\Providers;

use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

class AnnotationsServiceProvider extends ServiceProvider {

    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        'App\Http\Controllers\AdminControllers\AdminBannerController',
        'App\Http\Controllers\AdminControllers\AdminQuestionsController',
        'App\Http\Controllers\AdminControllers\AdminGalleryController',
        'App\Http\Controllers\AdminControllers\ImageUploadController',
        'App\Http\Controllers\AdminControllers\AdminSpecialController',

        'App\Http\Controllers\ProfileController',
        'App\Http\Controllers\AboutController',
        'App\Http\Controllers\ContactController',
        'App\Http\Controllers\CategoriesController',
        'App\Http\Controllers\QuestionsController',
        'App\Http\Controllers\AdsController',
        'App\Http\Controllers\AnswerController',
        'App\Http\Controllers\NottifactionsController',
        'ZaWeb\Shops\Http\Controllers\ShopController',
        'ZaWeb\Shops\Http\Controllers\CartController',
        'ZaWeb\Shops\Http\Controllers\ShopItemsController',
        'ZaWeb\Chat\Http\Controllers\ChatController',
        'ZaWeb\Chat\Http\Controllers\MessagesController',
        'App\Http\Controllers\UploadVKItemsController',
    ];

    /**
     * The classes to scan for model annotations.
     *
     * @var array
     */
    protected $scanModels = [
        'App\Models\Gallery',
        'App\Models\Special'
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;

}