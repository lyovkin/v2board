@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
Профиль
@stop

@section('css')
    <style>
        .blacked-text {
            color: #000;
        }
    </style>
@endsection

@section('content')
<div class="col-md-7">
  <div class="single-agent">
   <div class="well">
    <h3 class="page-title">
        <em>
             {{ $data->name }} {{ $data->last_name }}
        </em>
    </h3>
       @if (Session::has('message'))
           <div class="alert alert-info">{{ Session::get('message') }}</div>
       @endif
    <div class="row">
        <div class="col-md-4 col-sm-6">
            @if($data->avatar)
                    <img class="img-thumbnail" alt="{{ $data->name }} {{ $data->last_name }}" src="{{ url('img', ['profile', $data->avatar->name ]) }}?w=160&h=160&fit=crop">
            @else
                <a href="/profile/{{ $data->user->id}}/edit#additionalinfo">
                    <img class="img-thumbnail" alt="{{ $data->name }} {{ $data->last_name }}" src="http://placehold.it/160x160">
                </a>
            @endif
        </div>
      <div class="col-md-7 col-sm-7">
        <div class="agent-contact-details">
          <ul class="list-group blacked-text">
            <li class="list-group-item">
                @if($data->city_id)
                    <span style="float:right" class="blacked-text">{{ $data->city->city_name }}</span>
                @else
                    <span style="float:right" class="blacked-text"><a href="/profile/{{$data->user->id}}/edit">Укажите город</a></span>
                @endif
        
              Город 
            </li>
            <li class="list-group-item">
              
                @if($data->phone)
                    <span style="float:right" >{{ $data->phone}}</span>
                @else
                    <span style="float:right"> <a href="/profile/{{$data->user->id}}/edit" class="blacked-text">Укажите телефон</a></span>
                @endif
              Телефон 
            </li>
            <li class="list-group-item">
              
                    <span style="float:right" >{{ $data->user->email}}</span>
              Почта 
            </li>
            <li class="list-group-item">
                <span style="float: right"><button class="btn btn-sm btn-default" style="padding: 3px 10px">
                        <a href="http://chat.hlv24.ru/" style="text-decoration: none" class="blacked-text"> Начать чат</a></button></span>
                Чат
            </li>
              <li class="list-group-item">
                          <span style="float:right" >{{$data->user->balance}} <i class="fa fa-rub">
                              </i></span>
                  Ваш баланс
              </li>
              <li class="list-group-item">
                  <span>
                          <a style="text-decoration: none" class="blacked-text" href="{{route('profiles.payments')}}">История платежей</a>
                      <i class="fa fa-cc-mastercard" style="float: right;"></i> </span>

              </li>
            <li class="list-group-item blacked-text">
              <div class="social-icons" style="margin-top: 0px">

                <a href="{{$data->vkcom}}" style="background-color: white">
                  <i class="fa fa-vk">
                  </i>
                </a>
                <a href="#" style="background-color: white">
                  <i class="fa fa-twitter">
                  </i>
                </a>
                <a href="#" style="background-color: white">
                  <i class="fa fa-google-plus">
                  </i>
                </a>
                <a href="#" style="background-color: white">
                  <i class="fa fa-envelope">
                  </i>
                </a>
                <a href=" /profile/{{$data->user->id}}/edit " style="background-color: white; float: right"
                   class="blacked-text">  Редактировать профиль</a>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
  </div>
    <h3>
        @if(count($data['attachment_id']) > 0)
            Ваши последние объявления
        @endif

    </h3>
    <hr>
    <div class="property-grid">
        <ul class="grid-holder col-3">
            @foreach(\App\Models\Advertisement::approved()->with('ads_attachment')->with('city')->where('user_id', $data->user_id)->limit(3)->get() as $ads)
                <li class="grid-item type-rent">
                    <div class="property-block">

                            @if(isset($ads->ads_attachment[0]))
                                <img src="{{ url('img', ['advertisements', $ads->ads_attachment[0]->name]) }}?w=200&h=150&fit=crop" alt="">
                            @endif
                            <span class="images-count">
              <i class="fa fa-picture-o">
              </i>
                                {{ count($ads['ads_attachment']) }}
            </span>




                        <div class="property-info">
                            <h4 class="row-content">
                                <a href="{{ url('ads',  $ads["id"]) }}">
                                    {{ $ads->type->name }}
                                </a>
                            </h4>
                            <p class="blacked-text">
                                {{ mb_substr($ads->text, 0, 75) . (mb_strlen($ads->text) > 50 ? ' ...': '')}}
                            </p>
            <span class="location">
                @if($ads["city"]['city_name'])
                   <span class="blacked-text">{{ $ads["city"]['city_name'] }}</span>
                @else
                    Любой город
                @endif
            </span>
                            <div class="price">
              <span>

              <i class="fa fa-rub">
              </i>
                  {{ $ads['price'] }}
              </span>
                            </div>
                            <p>
                            <p><a href="{{ url('ads', $ads->id) }}" class="btn btn-xs btn-primary">Смотреть
                                    <i class="fa fa-long-arrow-right"></i></a></p>
                            </p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@stop