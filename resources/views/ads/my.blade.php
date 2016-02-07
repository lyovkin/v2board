@extends('layouts.app')
@section('title')
    Мои объявления
@stop

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
        <div class="posts">

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
                            <div class="col-md-{{isset($ad->ads_attachment[0]) ? '8':'12'}}">


                            <span class="post-meta meta-data {{ 0 == $ad->approved ? 'post-meta-red' : '' }}">

                                 <span> <i class="fa fa-check-circle-o"><a href="{{ url('ads', $ad->id) }}" style="text-decoration: none"></a></i>{{$ad->type->name}}</span>
                                <span><i class="fa fa-calendar"></i> {{$ad->created_at}}</span>
                                <span><i class="fa fa-folder-open"></i>
                                    <a
                                            href="/category/{{$ad->category->alias}}" style="text-decoration: none;">{{$ad->category->title}}</a>

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
                                           <button type="submit" class="btn-naked"><span class="naked-text"> В избранное</span>
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
                               <!--  <span><a href="#"><i class="fa fa-comment"></i> 12</a></span> -->
                                </span>

                                <p class='row-content'>{{$ad->text}}</p>

                                <a href="{{ url('ads', $ad->id) }}" class="btn btn-primary btn-sm">Смотреть
                                        <i class="fa fa-long-arrow-right"></i></a>

                                {!! Form::open(array('url' => 'ads/' . $ad->id , 'style' => 'float:right')) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                <button type="submit" class="btn btn-danger btn-sm"> Удалить <i class="fa fa-remove"></i> </button>
                                {!! Form::close() !!}

                                <a href="{{ action('AdsController@edit', $ad->id) }}" class="btn btn-primary btn-sm" style="margin-right: 10px; float: right; background-color: #428bca; ">Редактировать <i class="fa fa-refresh"></i></a>

                                @if($ad->approved == 1)
                                    {!! Form::open(['url'=>["ads/$ad->id/unpublish"],'role'=>'form', 'method' => 'POST', 'style' => 'float:right; margin-right:10px']) !!}
                                    <button type="submit" class="btn btn-warning btn-sm" > Снять <i class="fa fa-warning"></i> </button>
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