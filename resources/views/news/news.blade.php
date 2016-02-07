@extends('layouts.app')

@section('content')
    <div class="col-md-7">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i>
                    <i class="fa fa-rss"></i></span>Новости</h4>
        </div>
        <ul class="timeline">
           {{--
            @foreach($news as $article)
                {!! NewsService::viewNews($article) !!}
            @endforeach
           --}}

            <li class="timeline-inverted">
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h3 class="timeline-title"><a href="blog-post.html">Новость</a></h3>
                        <p><small class="text-muted"><i class="fa fa-calendar"></i> 28th March, 2014</small></p>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge">Mar<span>2014</span></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h3 class="timeline-title"><a href="blog-post.html">Новость</a></h3>
                        <p><small class="text-muted"><i class="fa fa-calendar"></i> 28th March, 2014</small></p>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h3 class="timeline-title"><a href="blog-post.html">Новость</a></h3>
                        <p><small class="text-muted"><i class="fa fa-calendar"></i> 28th March, 2014</small></p>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                    </div>
                </div>
            </li>
        </ul>

    </div>

@stop
