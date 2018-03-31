{!! Form::model($shop, ['route' => ['admin.user.storeshop'], 'id'=>$shop->id, 'files'=>true]) !!}
<div class="form-group">
    {!! Form::label('name', 'Название') !!}

    {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Название магазина']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', 'Телефон') !!}

    {!! Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Телефон магазина']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}

    {!! Form::text('email', old('Email'), ['class'=>'form-control', 'placeholder'=>'Email магазина']) !!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Категория магазина') !!}
    <select name='category' class='form-control' required="required">
        <option selected disabled>Выберете категорию</option>

        @foreach(\App\Models\ShopCategories::all() as $cat)
            <option value='{{ $cat['id'] }}'>{{ $cat['name'] }}</option>
        @endforeach
    </select>
    <a href="#" onclick="$('select[name=category]').val('Выберете категорию');return false;">Убрать</a>
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
    {!! Form::label('capacity', 'Количество товаров') !!}

    {!! Form::select('capacity', [500 => 500, 2000 => 2000], old('capacity'), ['class'=>'form-control', 'placeholder'=>'Количество товаров']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Описание') !!}

    {!! Form::textarea('description', old('description'), ['class'=>'form-control', 'placeholder'=>'Описание магазина']) !!}
</div>

<div class="form-group">
    {!! Form::label('attachment', 'Картинка') !!}
    {!! Form::file('attachment', old('attachment')) !!}
</div>
<input type="hidden" name="user_id" value="{{$user->id}}">
<input type="hidden" name="page" value="{{ $page }}">
<div class="form-group">
    {!! Form::submit('Создать магазин', ['class'=>'btn btn-success']) !!}
</div>
{!! Form::close() !!}
