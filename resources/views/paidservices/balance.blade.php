@extends('layouts.app')

@section('title')
    Пополнить баланс
@endsection

@section('content')
    <div class="col-md-7">
        <div class="col-sm-12">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="well">
                <h4 style="margin: 0px; font-size: 17px">
                    <i class=" fa fa-phone"></i> Возникли вопросы? Для связи нажмите
                    <span class="btn btn-xs btn-primary" onclick="javascript:jivo_api.open();"><strong>сюда</strong></span>
                </h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="well">
                <p class="badge"> Пополнение счета <span class="fa fa-credit-card">
                        </span></p> <img src="/img/robokassa.png"  style="width: 20%" alt=""  /><span class="h5"> PROTECTED</span>
                {!! Form::open(array('action' => 'PaymentController@createPayment')) !!}
                <input type="text" class="form-control" name="OutSum" placeholder="Введите сумму для пополнения в рублях"
                       required pattern="[0-9]+">
                <button type="submit" class="btn btn-success btn-sm">Пополнить</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection