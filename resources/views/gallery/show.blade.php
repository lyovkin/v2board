@extends('layouts.app')
@section('title')
    {{ $gallery->title }}
@stop
@section('js')

@stop

@section('og_description'){{ $gallery->description }}@stop
@section('keywords'){{ $gallery->tags }}@stop

@section('content')
    <div class="col-md-7">
        <h1>{{ $gallery->title }}</h1>
        {!! $gallery->article !!}

        @if(count($gallery->attachments))

            @if (1 == $gallery->columns)
                <ul class="timeline">
                @foreach($gallery->attachments as $i => $picture)

                    <li class="{{$i % 2 ? 'timeline-inverted': ''}}">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3 class="timeline-title">{{$picture->comment}}</h3>
                            </div>

                            @if($picture->link)
                                <a href="{{$picture->link}}"><img src="{{$picture->url}}" alt="{{$picture->comment}}"/></a>
                            @else
                                <img src="{{$picture->url}}" alt="{{$picture->comment}}"/>
                            @endif
                        </div>
                    </li>
                @endforeach
                </ul>
            @elseif (2 == $gallery->columns)
                <div class="row">
                @foreach($gallery->attachments as $i => $picture)
                    <div class="col-sm-6">
                        <div class="timeline-heading">
                            <h3 class="timeline-title">{{$picture->comment}}</h3>
                        </div>

                        @if($picture->link)
                            <a href="{{$picture->link}}"><img src="{{$picture->url}}" alt="{{$picture->comment}}"/></a>
                        @else
                            <img src="{{$picture->url}}" alt="{{$picture->comment}}"/>
                        @endif
                    </div>

                    @if (0 == ($i+1)%2)
                        </div><div class="row">
                    @endif
                @endforeach
                </div>
            @elseif(3 == $gallery->columns)
                <div class="row">
                    @foreach($gallery->attachments as $i => $picture)
                        <div class="col-sm-4">
                            <div class="timeline-heading">
                                <h3 class="timeline-title">{{$picture->comment}}</h3>
                            </div>

                            @if($picture->link)
                                <a href="{{$picture->link}}"><img src="{{$picture->url}}" alt="{{$picture->comment}}"/></a>
                            @else
                                <img src="{{$picture->url}}" alt="{{$picture->comment}}"/>
                            @endif
                        </div>

                        @if (0 == ($i+1)%3)
                            </div><div class="row">
                        @endif
                    @endforeach
                </div>
            @endif
        @endif
    </div>
@stop