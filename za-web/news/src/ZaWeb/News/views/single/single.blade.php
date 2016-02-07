@extends($_SERVER['HTTP_HOST'] == env('APP_MOBILE_URL') ? 'm_layouts.app' : 'layouts.app')

@section('content')

{!! NewsService::viewArticle($article) !!}
    


@stop
