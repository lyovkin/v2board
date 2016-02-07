@extends('m_layouts.app')

@section('title')
    Услуги
@endsection

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{--{{ dd(\Auth::user()) }}--}}
@section('content')
    <p class="h3" style="text-align: center;">@if(\Auth::user() && \Auth::user()->profile->city->city_name)Услуги города {{ \Auth::user()->profile->city->city_name }} @else Услуги @endif</p>
            @foreach($services as $service)
            <div class="col-md-3" style="padding-right: 0px">
                <div class="panel panel-default">
                    <div class="panel-leftheading">
                        <h3 class="panel-lefttitle">{{ $service->city->city_name }}</h3>
                    </div>
                    <div class="panel-rightbody" style="padding: 0px">
                        @if($service->attachment)
                            <a href="{{ $service->link }}">
                            {!! HTML::image(url('img',
                            ['services', $service->attachment->name]).'?w=900&h=500&', 'a picture',
                            ['class' => 'img-responsive',
                            'data-toggle'=>"tooltip",
                            ]) !!}</a>
                        @else
                            &nbsp;
                        @endif

                    </div>
                   {{-- <a href="{{ $service->link }}" style="margin-left: 50px; text-decoration: none;" class="h4"><i class="fa fa-location-arrow"></i> {{ $service->text }}</a>--}}
                    <div class="clearfix">
                    </div>
                </div>
            </div>
            @endforeach
@endsection