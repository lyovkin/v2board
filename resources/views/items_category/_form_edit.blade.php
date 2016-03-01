{!! Form::open(array('url' => "items_category/$category->id", 'method' => 'PUT')) !!}

<div class="form-group">
    {!! Form::label('name', 'Название') !!}

    {!! Form::text('name', $category->name, ['class'=>'form-control', 'placeholder'=>'Название категорию', 'required']) !!}
</div>


<div class="form-group">
    {!! Form::label('description', 'Описание') !!}

    {!! Form::textarea('description', $category->description, ['class'=>'form-control', 'placeholder'=>'Описание категории', 'required']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Обновить категорию', ['class'=>'btn btn-success']) !!}
</div>

{!! Form::close() !!}
