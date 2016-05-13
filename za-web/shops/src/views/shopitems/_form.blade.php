{!! Form::model($items, ['route' => ['shopitems.store'], 'shop_id'=>$shop_id, 'files'=>true]) !!}
<div class="form-group">
    {!! Form::label('description', 'Имя товара') !!}

    {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Имя товара']) !!}
</div>

<div class="form-group">
{!! Form::label('category', 'Категория товара') !!}
<select name='category_id' class='form-control' required="required">
    <option selected disabled>Выберете категорию</option>

    @foreach($categories as $cat)
        <option value='{{ $cat->id }}'>{{ $cat->name }}</option>
    @endforeach
</select>
<a href="#" onclick="$('select[name=category]').val('Выберете категорию');return false;">Убрать</a>
</div>

<div class="form-group">
    {!! Form::label('art_number', 'Артикульный номер') !!}
    {!! Form::text('art_number', old('art_number'), ['class'=>'form-control', 'placeholder'=>'Артикул №']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Описание') !!}
    {!! Form::textarea('description', old('description'), ['class'=>'form-control', 'placeholder'=>'Описание товара']) !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Цена') !!}
    {!! Form::text('price', old('price'), ['class'=>'form-control', 'placeholder'=>'Цена товара']) !!}
</div>
<div class="form-group">
    {!! Form::label('attachment', 'Картинка') !!}
    {!! Form::file('attachment', old('attachment')) !!}
</div>
{!! Form::hidden('shop_id', $shop_id) !!}
<div class="form-group">
    {!! Form::submit('Добавить', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
