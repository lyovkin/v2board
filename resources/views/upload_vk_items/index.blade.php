@extends('layouts.app')

@section('title')
    Загрузка товаров из VK
@endsection

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
    <div class="col-md-7">
        <div class="row">
           привет!
        </div>
    </div>
@endsection