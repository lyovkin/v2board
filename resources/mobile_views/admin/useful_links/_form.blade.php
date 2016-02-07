<div class="form-group">
    {!! Form::label('title', 'Название', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('title', $link->title, ["class"=>"form-control",
        "placeholder"=>"Название",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('url', 'URL', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::url('url', $link->url, ["class"=>"form-control",
        "placeholder"=>"URL",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}

    </div>
</div>