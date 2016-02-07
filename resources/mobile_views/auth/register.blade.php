@extends('m_layouts.app')
@section('title')
    Регистрация
@stop
@section('js')

@stop
@section('content')
    <div class="col-md-8">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-caret-right icon-design"></i>
                    <i class="fa fa-list"></i></span>Регистрация</h4>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h5>Регистрация нового пользователя</h5></div>
            <div class="panel-body">

                @include('partials.errors.basic')
                {!! Form::open(['url'=>'/auth/register', 'class'=>'form-horizontal', 'role'=>'form']) !!}
               {{-- <div class="form-group">
                    {!! Form::label('user_name', 'Логин', ["class"=>"col-sm-3 control-label"]) !!}
                    <div class="col-sm-6">
                        {!! Form::text('user_name', old('user_name'), ["class"=>"form-control", "placeholder"=>"Логин"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Имя', ["class"=>"col-sm-3 control-label"]) !!}
                    <div class="col-sm-6">
                        {!! Form::text('name', old('name'), ["class"=>"form-control", "placeholder"=>"Имя"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', 'Фамилия', ["class"=>"col-sm-3 control-label"]) !!}
                    <div class="col-sm-6">
                        {!! Form::text("last_name", null, ["class"=>"form-control",
                        "placeholder"=>"Фамилия",
                        ]) !!}
                    </div>
                </div>--}}
                <div class="form-group">
                    {!! Form::label('email', 'Почта', ["class"=>"col-sm-3 control-label"]) !!}
                    <div class="col-sm-6">
                        {!! Form::text('email', old('email'), ["class"=>"form-control", "placeholder"=>"Почта",
                        "type"=>"email" ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Город', ["class"=>"col-sm-3 control-label"]) !!}
                    <div class="col-sm-6">
                        <select name='city' class='form-control'>
                            <option selected disabled>Выберете город</option>
                            @foreach(\App\Models\Cities::get()->toArray() as $city)
                            <option value='{{ $city['id'] }}'>{{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                        <a onclick="$('select[name=city]').val('Выберете город');return false;">Убрать</a>

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
                    {!! Form::label('confirm_password', 'Повторите пароль', ["class"=>"col-sm-3 control-label"]) !!}
                    <div class="col-sm-6">
                        {!! Form::password("password_confirmation", ["class"=>"form-control",
                        "placeholder"=>"Повторите пароль",
                        "type"=>"password"]) !!}
                    </div>
                </div>
 
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                        {!! Form::button('<i class="fa fa-btn fa-user"></i>Регистрация', ['type'=>'submit', 'class' =>
                        'btn btn-primary']) !!}

                    </div>
                </div>
                {!! Form::close() !!}

            </div>
            <div class="panel-footer">
                <a href="{{action('Auth\AuthController@getLogin')}}"><h5>Или войти <i class="fa fa-user"></i></h5>
                </a>
            </div>
        </div>
    </div>
@stop
