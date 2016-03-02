@extends('layouts.app')
@section('title')
    Мои объявления
@stop
@section('css')
    <style>
        form.btn-group + form.btn-group {
            margin-left: -5px;
        }
        .meta-data {
            color: #000;
        }

    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#buy_rise').click(function(){
                jivo_api.open();
                return false;
            });
        });
    </script>
@stop

@section('content')

    <div class="col-md-7">
        <div class="block-heading">
            <a href="{{route('ads.create')}}" class="btn btn-sm btn-primary pull-right">Подать объявление <i
                        class="fa fa-long-arrow-right"></i></a>

            <h4><span class="heading-icon"><i class="fa fa-comment"></i></span>Объявления</h4>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="block-info">
            <h3>Неодобренные объявления выделены красным</h3>
            <h4>Сейчас у Вас  <span class="badge">{{ $user->ads_rise }}</span> поднятий</h4>
        </div>
        <br />
        <div class="posts blacked-text">
                @foreach($ads as $ad)
                    <article class="post">
                    <div class="row">
                            <input type="hidden" class="ads_id" name="ads_id" value="{{ $ad->id }}" />
                        @if(isset($ad->ads_attachment[0]))
                            <div class="col-md-4 col-sm-4">
                                    @foreach($ad->ads_attachment as $image)
                                        <a href="{{$image->url}}"
                                           rel="prettyPhoto[{{$ad->id}}]" title="This is the description">
                                        {!! HTML::image($image->url.'?w=100&h=100&fit=crop', $image->comment,
                                        ['class' => 'img-thumbnail img-responsive']) !!}
                                            </a>
                                    @endforeach
                            </div>
                        @endif
                            <div class="col-md-{{ isset($ad->ads_attachment[0]) ? '8':'12' }}">
                                <span class="post-meta meta-data {{ 0 == $ad->approved ? 'post-meta-red' : '' }}">
                                <span> <i class="fa fa-check-circle-o"><a href="{{ url('ads', $ad->id) }}" style="text-decoration: none"></a></i>{{$ad->type->name}}</span>
                                <span><i class="fa fa-clock-o"></i> {{$ad->created_at->format('d/m/Y H:i:s')}}</span>
                                <span><i class="fa fa-tags"></i>
                                    <a href="/category/{{$ad->category->alias}}" style="text-decoration: none; color: #000">{{$ad->category->title}}</a>
                                </span>
                                @if($ad->price)
                                    <span><i class="fa fa-rub"></i>{{$ad->price}}</span>
                                @else
                                    <span><i class="fa fa-rub"></i>Нет цены</span>

                                @endif

                                @if(Auth::user())
                               <span>
                                   @if($favorited = in_array($ad->id, $favorites))

                                       {!! Form::open(['method' => 'DELETE', 'route' => ['favorites.destroy', $ad->id]]) !!}
                                   @else
                                        {!! Form::open(['route' => 'favorites.store']) !!}
                                              {!! Form::hidden('advertisement_id', $ad->id) !!}
                                   @endif
                                           <button type="submit" class="btn-naked"><span class="naked-text" style="color: #000;"> В избранное</span>
                                               <i class="fa fa-heart fa-2x {{in_array($ad->id, $favorites) ? 'favorited' : 'not-favorited' }}"></i>
                                           </button>
                                         {!! Form::close() !!}

                                   </span>
                               @endif

                                @if($ad->phone)
                                    <span><i class="fa fa-phone"></i>{{$ad->phone}}</span>
                                @else
                                    <span><i class="fa fa-phone"></i>Нет телефона</span>
                                @endif

                                @if($ad->approved == 0)
                                <span>
                                    {!! Form::open(['route' => ['ads.rise', $ad->id]]) !!}
                                        {!! Form::hidden('advertisement_id', $ad->id) !!}
                                        <button type="submit" disabled {{ !$user->ads_rise ? 'disabled' : '' }} class="btn btn-default btn-sm" style="background-color: #fa796a">
                                            <i class="fa fa-long-arrow-up"></i><span class="naked-text"> Поднять </span></button> <span class="badge">{{$ad->rating}}</span>
                                    {!! Form::close() !!}
                                </span>
                                @else
                                    <span>
                                    {!! Form::open(['route' => ['ads.rise', $ad->id]]) !!}
                                        {!! Form::hidden('advertisement_id', $ad->id) !!}
                                        <button type="submit"  {{ !$user->ads_rise ? 'disabled' : '' }} class="btn btn-default btn-sm " style="background-color: #fa796a">
                                            <i class="fa fa-long-arrow-up"></i><span class="naked-text"> Поднять </span></button> <span class="badge">{{$ad->rating}}</span>
                                    {!! Form::close() !!}
                                </span>
                                @endif
                                </span>

                                <p class="row-content" style="color: #000;">{{$ad->text}}</p>

                                <div class="btn-group">
                                    <a href="{{ url('ads', $ad->id) }}" class="btn btn-default btn-sm" type="button">Смотреть</a>

                                    <a href="{{ action('AdsController@edit', $ad->id) }}" class="btn btn-default btn-sm"
                                       type="button">Редактировать</a>

                                    <a href="http://vk.com/share.php?url={{ url('ads', $ad->id) }}" type="button"
                                       target="_blank" class="btn btn-default btn-sm">Поделиться в <i class="fa fa-vk"></i></a>
                                </div>

                                {!! Form::open(array('url' => 'ads/' . $ad->id, 'class' => 'btn-group', 'style' => 'margin-left: 9px;')) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                <button type="submit" class="btn btn-default btn-sm">Удалить</button>
                                {!! Form::close() !!}

                                @if($ad->approved == 1)
                                    {!! Form::open(['url'=>["ads/$ad->id/unpublish"],'role'=>'form', 'method' => 'POST', 'class' => 'btn-group inline']) !!}
                                    <button type="submit" class="btn btn-default btn-sm">Снять</button>
                                    {!! Form::close() !!}
                                @endif
                                <hr>
                            </div>
                        </div>
                    </article>

                @endforeach
                </div>

    </div>
@stop