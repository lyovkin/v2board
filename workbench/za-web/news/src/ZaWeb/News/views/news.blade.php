@extends('layouts.app')

@section('content')

@foreach($news as $article)
        {!! NewsService::viewNews($article) !!}
        {!! $news !!}

@endforeach
  

@stop
