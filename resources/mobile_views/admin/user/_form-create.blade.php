<div class="form-group">
    {!! Form::label('user_name', 'Имя пользователя', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('user_name', null, ["class"=>"form-control",
        "placeholder"=>"Логин",'required' => 'required', 'pattern' => '[\w\-\_]+' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Имя', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('name', null, ["class"=>"form-control", "placeholder"=>"Имя"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Фамилия', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text("last_name", null, ["class"=>"form-control",
        "placeholder"=>"Фамилия",
        ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'email', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::email('email', null, ["class"=>"form-control",
        "placeholder"=>"email",'required' => 'required' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', 'Пароль', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('password', null, ["class"=>"form-control",
        "placeholder"=>"Пароль", 'required', 'pattern' => '[\w\-\_]+']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('ads_rise', 'Поднятия', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        {!! Form::text('ads_rise', $user->ads_rise, ["class"=>"form-control",
        "placeholder"=>"Поднятия"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role', 'Роли', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        @foreach($roles as $role)
            <p>
                {!! Form::checkbox('roleCheck[]', $role->id, false, ['id'=> 'role'.$role->id]) !!}
                {!! Form::label('role'.$role->id, $role->name) !!}
            </p>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('city', 'Город', ["class"=>"col-sm-3 control-label"]) !!}
    <div class="col-sm-6">
        <select name='city' class='form-control'>
            <option selected disabled>Выберете город</option>

            @foreach(\App\Models\Cities::get()->toArray() as $city)
                <option value='{{ $city['id'] }}'>{{ $city['city_name'] }}</option>
            @endforeach
        </select>
        <a href="#" onclick="$('select[name=city]').val('Выберете город');return false;">Убрать</a>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-3">
        {!! Form::button('<i class="fa fa-btn fa-save"></i> Сохранить', ['type'=>'submit',
        'class' =>
        'btn btn-primary']) !!}
    </div>
</div>