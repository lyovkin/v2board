<div class="form-group">
    {!! Form::label('path', 'Путь', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('path', old('path'), ["class"=>"form-control",
        "placeholder"=>"Путь",'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('route', 'Название', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('route', old('route'), ["class"=>"form-control",
        "placeholder"=>"Название",'required' => 'required']) !!}
    </div>
</div>
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
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'buton b_red buton-3 buton-mini ']) !!}

    </div>
</div>