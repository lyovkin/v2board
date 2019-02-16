@extends('layouts.app')

@section('title')
    Вход
@endsection

@section('content')

    <div class="col-md-7">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i>
                    <i class="fa fa-list"></i></span>Вход</h4>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h5>Вам необходим авторизоваться</h5></div>
            <div class="panel-body">

                @include('partials.errors.basic')
                {!! Form::open(["url"=>"/auth/login", "class"=>"form-horizontal"]) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Почта', ["class"=>"col-sm-3 control-label"]) !!}
                    <div class="col-sm-6">
                        {!! Form::text("email", old('email'), ["class"=>"form-control",
                        "placeholder"=>"Почта",
                        "name"=>"email",
                        "autocapitalize"=>"on",
                        "type"=>"email",
                        "id"=>"loginEmail"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Пароль', ["class"=>"col-sm-3 control-label"]) !!}

                    <div class="col-sm-6">
                        {!! Form::password("password", ["class"=>"form-control",
                        "placeholder"=>"Пароль",
                        "type"=>"password"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox("remember") !!} Запомнить меня
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        {!! Form::button('<i class="fa fa-sign-in"></i> Вход', ['type'=>'submit',
                        'class' => 'btn btn-primary']) !!}

                    </div>
                    <div class="col-sm-3">
                        <div class="forgot-password text-right"><a href="/password/email">Забыли пароль?</a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}


            </div>
            <div class="panel-footer">
                <a href="{{action('Auth\AuthController@getRegister')}}"><h5>Или регистрация <i class="fa fa-user"></i>
                    </h5></a>
            </div>
        </div>

    </div>
@stop
