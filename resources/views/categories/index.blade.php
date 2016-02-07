@extends('layouts.app')

@section('title')
    Категории
@stop

@section('content')
    <div class="col-md-7">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i>
                    <i class="fa fa-list"></i></span>Категории</h4>
        </div>
        <div class="page">
            <ul>
            @foreach($categories as $category)
                <li><h3><a href="{{ url('category', $category->alias) }}">{{ $category->title }}</a></h3></li>
            @endforeach
            </ul>
        </div>
    </div>
@stop
