<div class="form-group">
    {!! Form::label('city_name', 'Название города', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('city_name', old('city_name'), ["class"=>"form-control",
        "placeholder"=>"Название города",'required' => 'required',
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