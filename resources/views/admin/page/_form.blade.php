<div class="form-group">
    {!! Form::label('title', "Заголовок", ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('title', null, ["class"=>"form-control",
            "placeholder"=>"Заголовок",'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('article', "Содержание", ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('article', null, ["class"=>"form-control",
        "placeholder"=>"Содержание", "id" => "editor","rows" => 25]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Meta description', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::textarea('description', null, ["class"=>"form-control",
        "placeholder"=>'Meta description', "rows" => 5]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Meta tags', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('tags', null, ["class"=>"form-control",
            "placeholder"=>'Meta tags', 'data-role' => "tagsinput"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug', ["class"=>"col-sm-2 control-label"]) !!}
    <div class="col-sm-9">
        {!! Form::text('slug', null, ["class"=>"form-control",
            "placeholder"=>'Slug','required', 'pattern' => '^[\w\-]+$' ]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>