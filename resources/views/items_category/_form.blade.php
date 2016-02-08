{!! Form::open(array('route' => 'items_category.store')) !!}

<div class="form-group">
    {!! Form::label('name', 'Название') !!}

    {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Название категорию', 'required']) !!}
</div>


<div class="form-group">
    {!! Form::label('description', 'Описание') !!}

    {!! Form::textarea('description', old('description'), ['class'=>'form-control', 'placeholder'=>'Описание категории', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Сохранить категорию', ['class'=>'btn btn-success']) !!}
</div>

{!! Form::hidden('shop_id', $shop_id) !!}

{!! Form::close() !!}
