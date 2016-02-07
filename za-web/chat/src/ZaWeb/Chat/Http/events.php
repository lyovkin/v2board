<?php
use App\Models\User;
use ZaWeb\Chat\Models\Chat;
use Illuminate\Support\Facades\DB;
Event::listen('generic.event',function($client_data){
    $user = User::where(DB::raw('md5(user_name)'), $client_data->data->user)->first()->user_name;
    $client_data->data->user_name = $user;
    $client_data->data->id =  Chat::orderBy('id', 'desc')->take(1)->first()->id;
    return BrainSocket::message('generic.event',array('message'=>'A message from a generic event fired in Laravel!'));
});

Event::listen('app.success',function($client_data){
    return BrainSocket::success(array('There was a Laravel App Success Event!'));
});

Event::listen('app.error',function($client_data){
    return BrainSocket::error(array('There was a Laravel App Error!'));
});