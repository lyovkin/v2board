@extends('layouts.app')

@section('content')

{!! NewsService::viewArticle($article) !!}
    


@stop
