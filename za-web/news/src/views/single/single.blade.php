@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')

@section('content')

{!! NewsService::viewArticle($article) !!}
    


@stop
