@extends('layouts.app')

@section('title')
    Платные услуги
@endsection

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@section('content')
    <div class="col-md-7">
        <div class="col-sm-12">
            <div class="well">
                    <h4 style="margin: 0px; font-size: 17px">
                        <i class=" fa fa-envelope-o"></i> По платным услугам
                        обрашайтесь к администратору, для связи нажмите
                        <span class="btn btn-xs btn-primary" onclick="javascript:jivo_api.open();"><strong>сюда</strong></span> или
                        <a href="https://vk.com/id164501152" class="btn btn-xs btn-success"><strong><i class="fa fa-vk"></i> </strong></a>
                    </h4>
            </div>
        </div>
            <div class="col-lg-4">
                <div class="well">
                    <p><span class="label label-success">Пополнение счета</span></p>
                    <p class="h4">В нашем магазине вы имеете возможность пополнения счета.</p>
                    <p>Сумма будет начислена на ваш текущий баланс, проверить остаток вы можете перейдя в профиль.</p>
                    <hr>
                    <p><a class="btn btn-default btn-large" href="{{ action('PaidServicesController@balance') }}"><i class="icon-ok"></i>Пополнить счет</a></p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="well">
                    <p><span class="label label-default">Покупка поднятий</span></p>
                    <p class="h4">В магазине действует услуга покупки поднятий.</p>
                    <p>Покупая 30 или более поднятий, мы возвращаем Вам 100 <i class="fa fa-ruble"></i> на счет. Стоимость 1 поднятия составляет 10 <i class="fa fa-ruble"></i>.</p>
                    <hr>
                    <p><a class="btn btn-default btn-large" href="{{ action('PaidServicesController@rise') }}"><i class="icon-ok"></i>Купить поднятия</a></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="well">
                    <p><span class="label label-info">Покупка магазина</span></p>
                    <p class="h4">Мы предоставляем возможность покупки магазина.</p>
                    <p>У вас есть возможность покупики виртуального магазина, стоимость услуги 500 товаров = 500 <i class="fa fa-ruble"></i> или 2000 товаров = 1000 <i class="fa fa-ruble"></i>.</p>
                    <hr>
                    @if(Auth::check())
                        <p><a class="btn btn-default btn-large" href="{{ route('shops.create') }}"><i class="icon-ok"></i>Купить магазин</a></p>
                    @endif
                </div>
            </div>
    </div>
@endsection