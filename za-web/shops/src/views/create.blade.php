@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Создать магазин
@stop

@section('content')
    <div class="col-md-7">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3">Создать новый магазин</p>
                <p class="h5">Стоимость услуги создания магазина составляет 500 товаров = 500 <i class="fa fa-ruble"></i>
                    или 2000 товаров = 1000 <i class="fa fa-ruble"></i>. </p><p>Сумма будет списана с Вашего баланса.</p>
                <p class="h5">Ваш баланс составляет <strong>{{ Auth::user()->balance }}</strong> <i class="fa fa-ruble"></i>
                <a class="btn btn-warning btn-xs" href="{{ action('PaidServicesController@balance') }}" style="margin-left: 20px;">Пополнить счет</a></p>
            </div>
            <div class="panel-body">
                @include('partials.errors.basic')

                @include('shops::_form')
            </div>
        </div>
    </div>
@stop
