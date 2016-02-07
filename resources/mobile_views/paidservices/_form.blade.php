<div class="form-group">
   {{-- <h3>{{ $user->user_name }} пожалуйста, заполните форму заявки</h3>--}}
    <div class="col-sm-6">
        {!! Form::hidden('user_id', $user->id, ["class"=>"form-control",
        "placeholder"=>"Пользователь №",'required' => 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('title', 'Заголовок', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('title', old('title'), ["class"=>"form-control",
        "placeholder"=>"Заголовок",'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('about', 'Описание заявки', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::textarea('about', old('about'), ["class"=>"form-control",
        "placeholder"=>"Описание заявки",'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}

    </div>
</div>