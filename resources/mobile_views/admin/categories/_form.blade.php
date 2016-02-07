<div class="form-group">
    {!! Form::label('title', 'Заголовок', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('title', old('title'), ["class"=>"form-control",
        "placeholder"=>"Заголовок",'required' => 'required',
        "type"=>"email" ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Описание', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', old('description'), ["class"=>"form-control",
        "placeholder"=>"Описание",'required' => 'required',
        "type"=>"email" ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Алиас', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('alias', old('alias'), ["class"=>"form-control",
        "placeholder"=>"Алиас",'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('attachment', 'Картинка', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::file('attachment', old('attachment'), ["class"=>"form-control",
        "placeholder"=>"Картинка",'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}

    </div>
</div>