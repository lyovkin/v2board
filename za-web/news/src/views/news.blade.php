@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')

@section('content')

@foreach($news as $article)
        {!! NewsService::viewNews($article) !!}
        {!! $news !!}

@endforeach
  

@stop
