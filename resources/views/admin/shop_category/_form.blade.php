<div class="form-group">
    {!! Form::label('name', 'Название', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', $type->name, ["class"=>"form-control",
        "placeholder"=>"Название",'required' => 'required' ]) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label('description', 'Описание', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', $type->description, ["class"=>"form-control",
        "placeholder"=>"Название",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}

    </div>
</div>