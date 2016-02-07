<!-- TEXT -->
<div class="form-group">
    {!! Form::label('text', 'Текст', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('text', $special->text, ["class"=>"form-control",
        "placeholder"=>"Текст супер предложения",'required' => 'required']) !!}
    </div>
</div>

<!-- PRICE -->
<div class="form-group">
    {!! Form::label('price', 'Цена', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('price', $special->price, ["class"=>"form-control",
        "placeholder"=>"Цена",'required' => 'required']) !!}
    </div>
</div>

<!-- LINK -->
<div class="form-group">
    {!! Form::label('link', 'Ссылка', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('link', $special->link, ["class"=>"form-control",
        "placeholder"=>"http://primer.ru",'required' => 'required']) !!}
    </div>
</div>