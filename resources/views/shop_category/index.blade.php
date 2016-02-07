@extends('layouts.app')

@section('title')
    Категории магазинов
@endsection

@section('css')
<link href="/css/shops_cat.css" rel="stylesheet">
@endsection

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
            <div class="col-md-7">
                    <div class="row">
                    @foreach($links as $link)

                        <div class="col-md-5">
                            <form action="{{ action('ShopCategoriesController@filter') }}" method="post">
                                <p>
                                    <input type="hidden" name="id" value="{{ $link->id }}">

                                    <button
                                            class="btn btn-outlined btn-theme btn-lg"
                                            type="submit"
                                            data-wow-delay="0.7s">{{ $link->name }}
                                    </button>
                                </p>
                            </form>
                        </div>

                    @endforeach
                    </div>
                </div>
@endsection