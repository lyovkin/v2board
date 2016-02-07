@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
Профиль
@stop
@section('js')

@stop
@section('content')
          <div class="col-md-7">
            <div class="single-agent">
              <div class="counts pull-right"> <strong>Дата регистрации</strong> <span>{{ Auth::user()->created_at }}</span></div>
              <h2 class="page-title">{{ Auth::user()->user_name }}</h2>
            </div>
                          @include('partials.errors.basic')
              @if (Session::has('message'))
                  <div class="alert alert-danger">{{ Session::get('message') }}</div>
              @endif

              <div class="block-heading" id="details">
                <h4><span class="heading-icon"><i class="fa fa-user"></i></span>Профиль ( {{ Auth::user()->user_name }} )</h4>
              </div>
              <div class="padding-as25 margin-30 lgray-bg">
                <div class="row">

                  {!! Form::model($profile, ['route'=> ['profiles.update', 'id'=>$profile->user->id]]) !!}
                  <div class="form-group">
                      
                      <label>Имя</label>
                      {!! Form::text('name', old('name'), ['class'=>'form-control first_name',
                                                                                    'placeholder'=>'Имя',
                                                                                    'required'=>'']) !!}
                  </div>
                  <div class="form-group">
                      <label>Фамилия</label>
                      {!! Form::text('last_name', old('name'), ['class'=>'form-control last_name_name',
                                                                                    'placeholder'=>'Фамилия',
                                                                                    'required'=>'']) !!}                  </div>
                  <div class="form-group">
                      <label>Телефон</label>
                      {!! Form::text('phone', old('name'), ['class'=>'form-control phone',
                                                                                    'placeholder'=>'Телефон',]) !!}
                  </div>
                  <div class="form-group">
                      <label>Город</label>
                       <select name='city_id' class='form-control' >

                                Выбирете город
                            @foreach($cities as $city)
                                <option value='{{ $city['id'] }}'>{{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                        <a onclick="$('select[name=city]').val('Не указано');return false;">Убрать</a>
                  </div>
                  <label>Обо мне</label>
                  <div class='form-group'>
                      {!! Form::textarea('about', old('about'), ['class'=>'form-control', 'placeholder'=>'Обо мне']) !!}
                  </div>
                  {!! Form::submit('Сохранить', ['class'=>'btn btn-primary']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
              <div class="block-heading" id="additionalinfo">
                <h4><span class="heading-icon"><i class="fa fa-plus"></i></span>Персональная информация</h4>
              </div>
              <div class="padding-as25 margin-30 lgray-bg">

                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <label>Выберете картинку</label>
                    <p>Загрузите аватар и люди увидят его в вашем профиле</p>
                  </div>
                  <div class="col-md-8 col-sm-8 submit-image">
                    <div class="image-placeholder">
                        <img src="" class="image-placeholder"  id="agent-image" alt="600x400 (JPG)"/>

                    </div>
                      {!! Form::model($profileAttachment, ['route'=> ['profiles.upload', 'id'=>$profile->user->id], 'files'=>true]) !!}
                      <input type='file' name='upl'>

                  </div>
                            {!! Form::submit('Сохранить', ['class'=>'btn btn-primary'] ) !!}
                        {!! Form::close() !!}
                </div>
              </div>
              <!---
               <div class='block-heading' id='soc'>
                   <h4><span class='heading-icon'><i class='fa fa-group'></i></span>Соц.сети</h4>
                   
                </div> 
               <div class="padding-as25 margin-30 lgray-bg">
                 <div class="row">
                     
                        <div class='form-group'>
                            <label>Ссылка ВКонтакте</label>


                        </div>

                </div>
              </div>
              -->

              <div class="block-heading" id="amenities">
                <h4><span class="heading-icon"><i class="fa fa-user"></i></span>Аккаунт</h4>
              </div>
              <div class="padding-as25 margin-30 lgray-bg">
                 <div class="row">
                  {!! Form::model($user, ['route'=> ['profiles.user','id'=>$profile->user->id ]]) !!}
                  <div class="form-group">

                      <label>Логин</label>
                      {!! Form::text('user_name', old('email'), ['class'=>'form-control',
                                                                                    'placeholder'=>'Логин',
                                                                                    'required'=>'']) !!}
                  </div>
              
                     <div class="form-group">
                      <label>Email</label>
                      {!! Form::text('email', old('email'), ['class'=>'form-control',
                                                    'placeholder'=>'Email',
                                                    'required'=>''
                                                                ]) !!}
                  </div>
                     <div class="form-group">
                         <label>Для обновления введите свой пароль</label>
                         {!! Form::password('old_password', ['class'=>'form-control','placeholder'=>'Ваш пароль',
                         'required'=>''
                         ]) !!}
                     </div>


                  {!! Form::submit('Сохранить', ['class'=>'btn btn-primary']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
               <div class="block-heading" id="amenities">
                <h4><span class="heading-icon"><i class="fa fa-gear"></i></span>Безопасность</h4>
              </div>
              <div class="padding-as25 margin-30 lgray-bg">
                 <div class="row">
                  {!! Form::open(['url'=>'profile/update/user']) !!}
     
                     <div class="form-group">
                      <label>Новый пароль</label>
                      {!! Form::password('password', ['class'=>'form-control',
                                                               'required'=>''
                                                                ]) !!}
                    </div>
                  <div class="form-group">
                      <label>Повторите пароль</label>
                       {!! Form::password('password_confirmation', ['class'=>'form-control',
                                                               'required'=>''
                                                                ]) !!}
                  </div>

                  {!! Form::submit('Сохранить', ['class'=>'btn btn-primary']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
        </div>
@stop