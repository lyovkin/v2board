@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Вопросы
@stop
@section('js')

@stop
@section('content')
    <div class="col-md-7">
        <div class="block-heading">
            <a href="{{ url('questions/create')}}" class="btn btn-sm btn-primary pull-right">Задать вопрос <i
                        class="fa fa-long-arrow-right"></i></a>
            <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Вопросы</h4>
        </div>
        <div class="property-listing">
        <ul>

        @foreach($questions as $question)
                <li class="type-rent col-md-12" style="padding: 10px">
                    @if($question->questions_attachment)
                    <div class="col-md-4">
                            <a href="" class="property-featured-image"> <img src="{{ $question->questions_attachment->url }}" alt="">
                        </a>
                    </div>
                    @endif
                    <div class="col-md-{{isset($question->questions_attachment) ? '8':'12'}}">
                        <div class="property-info">
                            <a class="price" href="{{route('questions.show',$question->id )}}#comments">
                                <span>Ответов</span><strong>{{ count($question->comments) }}</strong>
                            </a>
                            <h4>
                                <a href='{{route('questions.show',$question->id )}}'><em>Вопрос открыл: {{$question->user->user_name}}</em></a>
                            </h4>
                            {{--<h3><a href="{{ url('questions', $question->id)  }}">{{ $question->title }}</a></h3>--}}
                            
                            <span class="location">
                            @if ($question->city)
                                {{ $question->city->city_name }}
                            @else
                                        Город не указан
                            @endif
                            </span>

                            <p>
                                {{ $question->text }}
                            </p>
                        </div>
                        <!---<div class="property-amenities clearfix"> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>-->
                    </div>
                </li>
        @endforeach
            </ul>
            </div>
        {!! $questions !!}

    </div>
@stop
