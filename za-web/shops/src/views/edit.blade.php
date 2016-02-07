@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Создать магазин
@stop

@section('content')
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Редактировать магазин</h3>
            </div>
            <div class="panel-body">
                @include('partials.errors.basic')

                {!! Form::model($shop->toArray(), ['route' => ['shops.update', 'id'=>$shop->id], 'files'=>true, 'method'=>'PATCH']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Название') !!}

                    {!! Form::text('profile[name]', old('name'), ['class'=>'form-control', 'placeholder'=>'Название магазина']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', 'Телефон') !!}

                    {!! Form::text('profile[phone]', old('phone'), ['class'=>'form-control', 'placeholder'=>'Телефон магазина']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}

                    {!! Form::text('profile[email]', old('Email'), ['class'=>'form-control', 'placeholder'=>'Email магазина']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('city', 'Город') !!}
                    <select name='city' class='form-control'>
                        <option selected disabled>Выберете город</option>

                        @foreach(\App\Models\Cities::get()->toArray() as $city)
                            <option value='{{ $city['id'] }}'>{{ $city['city_name'] }}</option>
                        @endforeach
                    </select>
                    <a href="#" onclick="$('select[name=city]').val('Выберете город');return false;">Убрать</a>
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Описание') !!}

                    {!! Form::textarea('profile[description]', old('description'), ['class'=>'form-control', 'placeholder'=>'Описание магазина']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('attachment', 'Картинка') !!}
                    {!! Form::file('attachment', old('attachment')) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Отправить', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
