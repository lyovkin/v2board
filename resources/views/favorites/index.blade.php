@extends('layouts.app')

@section('title')
    Избранные объявления
@endsection

@section('content')
    <div class="col-md-7 posts-archive">
        <div class="block-heading">

            <a href="{{route('ads.create')}}" class="btn btn-sm btn-primary pull-right">Подать обьявление <i
                        class="fa fa-long-arrow-right"></i></a>

            <button id='new_ads' disabled='' class='btn btn-sm btn-primary pull-right'>
                Новые
                <span class='new_ads_count'></span>
            </button>
            <h4><span class="heading-icon"><i class="fa fa-comment"></i></span>Обьявления</h4>
        </div>

        <ul class="updates">
            @include('handlebars.question')
        </ul>
        <script id="some-template" type="text/x-handlebars-template">
            @{{#each ads}}
            <article class="post">

                <div class="row">
                    <input type='hidden' name='ads_id' class='ads_id' value='@{{ id }}'>
                    <div class="col-md-4 col-sm-4">
                        @{{#each ads_attachment }}
                        <a href="#"
                           rel="prettyPhoto[@{{id}}]" title="@{{comment}}">
                            <img src="@{{url}}/?w=100&h=100&fit=crop"
                                 class='img-thumbnail img-responsive'>

                        </a>
                        @{{/each}}
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/ads/@{{ id }}">@{{ title }}</a></h3>
                    <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i>@{{ created_at }}</span>
                        <span><i class="fa fa-folder-open"></i>
                            <a
                                    href="/category/@{{ category.alias }}">@{{ category.title }}</a>

                        </span>
                        <span><i class="fa fa-rub"></i>@{{ price }}</span>
                       <!--  <span><a href="#"><i class="fa fa-comment"></i> 12</a></span> -->
                        </span>

                        <p class='row-content'>@{{ text }}</p>

                        <p><a href="#" class="btn btn-primary">Смотреть
                                <i class="fa fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
            </article>
            @{{/each}}

        </script>
        <div class="posts">


        @foreach($ads as $ad)
                <article class="post">

                    <div class="row">

                        <input type="hidden" class="ads_id" name="ads_id" value="{{ $ad->id }}" />
                        @if(isset($ad->ads_attachment[0]))
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                @foreach($ad->ads_attachment->slice(0, 1) as $image)
                                    <a href="{{$image->url}}"
                                       rel="prettyPhoto[{{$ad->id}}]" title="">
                                        {!! HTML::image($image->url.'?w=200&fit=crop', $image->comment,
                                        ['class' => 'img-thumbnail img-responsive']) !!}
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                {!! HTML::image('/img/no.jpg', '', array('class' => 'img-thumbnail img-responsive')) !!}
                            </div>
                        @endif
                        <div class="col-md-8 col-sm-8 col-xs-8">
                    <span class="post-meta meta-data">
                        {{--<span><i class="fa fa-calendar"></i> {{$ad->created_at}}</span>--}}
                        <span><i class="fa fa-tag"></i>
                            <a
                                    href="/category/{{$ad->category->alias}}" style="text-decoration:none;">{{$ad->category->title}}</a>

                        </span>
                        <span><i class="fa fa-map-marker"></i>
                            @if ($ad->city)
                                {{ $ad->city->city_name }}
                            @else
                                Город не указан
                            @endif
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
                                <button type="submit" class="btn-naked"><span class="naked-text"> Убрать из избранного</span>
                                    <i class="fa fa-star {{in_array($ad->id, $favorites) ? 'favorited' : 'not-favorited' }}"></i>
                                </button>
                                 {!! Form::close() !!}

                           </span>
                            @endif
                        @if($ad->phone)
                            <span><i class="fa fa-phone"></i>{{$ad->phone}}</span>
                        @else
                            <span><i class="fa fa-phone"></i>Нет телефона</span>
                        @endif
                        </span>

                            <p class='row-content'>{{$ad->text}}</p>

                            <p><a href="{{ url('ads', $ad->id) }}" class="btn btn-primary">Смотреть
                                    <i class="fa fa-long-arrow-right"></i></a></p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection