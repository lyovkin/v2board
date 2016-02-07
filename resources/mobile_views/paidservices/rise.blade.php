@extends('m_layouts.app')

@section('title')
    Купить поднятия
@endsection

@section('content')
    <div class="col-md-8">
        <div class="col-sm-12">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="well">
                <h4 style="margin: 0px; font-size: 17px">
                    {{--<i class=" fa fa-vk"></i>--}} Возникли вопросы? Для связи нажмите
                  {{-- <span class="btn btn-xs btn-primary" onclick="javascript:jivo_api.open();"><strong>сюда</strong></span>--}}
                    <a href="https://vk.com/id164501152" class="btn btn-xs btn-success"><strong><i class="fa fa-vk"></i> </strong></a>
                </h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="well">
                <p class="badge"> Покупка поднятий <span class="fa fa-long-arrow-up"></span>
                <p class="h5">В завимости от количества поднятий, необходимая сумма будет списана с вашего баланса.</p>
                <p class="h5">При покупке 30 или более поднятий, мы возвращаем 100 <i class="fa fa-ruble"></i> на счет.</p>
                <p class="h5">Ваш баланс составляет <strong>{{ Auth::user()->balance }}</strong> <i class="fa fa-ruble"></i></p>
                <p class="h5">Сейчас у Вас <strong>{{ Auth::user()->ads_rise }}</strong> поднятий. Стоимость  1 поднятие = 10 <i class="fa fa-ruble"></i></p>
                <div>
                    {!! Form::open(['action'=>['AdsController@getRaising'], 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                    {!! Form::text('rise_count', 1, [ 'style' => 'width:50%', 'class' => 'form-control', 'size' => 3]) !!}
                    {!! Form::button("Купить поднятия", ['type'=>'submit', 'class'=>'btn btn-success btn-sm', 'style' => 'text-shadow: none']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection