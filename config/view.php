<?php

/**
 * Detector mobile or tablet device
 */
$detector = new Mobile_Detect();

if (@$_SERVER['HTTP_HOST'] == env('HOST') || ($detector->isMobile() && $detector->isTablet())) {
    $viewPath = base_path() . '/resources/mobile_views';
}else{
    $viewPath = base_path() . '/resources/views';
}

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => array($viewPath),                                    //[string] path to folder views

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => storage_path() . '/framework/views',

];
