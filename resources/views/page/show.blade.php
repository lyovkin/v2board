@extends('layouts.app')
@section('title')
    {{ $page->title }}
@stop
@section('js')

@stop

@section('og_description'){{ $page->description }}@stop
@section('keywords'){{ $page->tags }}@stop

@section('content')
    <div class="col-md-8">
        <h1>{{ $page->title }}</h1>
        {!! $page->article !!}
    </div>
@stop