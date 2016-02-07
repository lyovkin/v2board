<!-- TEXT -->
<div class="form-group">
    {!! Form::label('text', 'Текст', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('text', old('text'), ["class"=>"form-control",
        "placeholder"=>"Текст услуги",'required' => 'required']) !!}
    </div>
</div>

<!-- LINK -->
<div class="form-group">
    {!! Form::label('link', 'Ссылка', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('link', old('link'), ["class"=>"form-control",
        "placeholder"=>"http://...",'required' => 'required']) !!}
    </div>
</div>

<!-- time -->
<div class="form-group">
    {!! Form::label('time', 'Показывать до', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('time', old('time'), ["class"=>"form-control","id"=>"datepicker",
        'required' => 'required', "placeholder"=>"Показывать до"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('city_id', 'Город для показа', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        <select name='city_id' class='form-control'>
            <option selected disabled>Выберете город</option>
            @foreach(\App\Models\Cities::get()->toArray() as $city)
                <option value='{{ $city['id'] }}'>{{ $city['city_name'] }}</option>
            @endforeach
        </select>
    </div>
</div>



