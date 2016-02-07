@extends('m_layouts.app')

@section('content')

{!! NewsService::viewArticle($article) !!}
    


@stop
