@extends('layouts.app')

@section('title')
    {{ $ads->category->title . " - " . substr($ads->text, 0, 30) }}
@endsection

@section('og_description')
{{ $ads->text }}
@stop
@section('og_image')
@if(isset($ads->ads_attachment[0]))
    {{ url('img', ['advertisements', $ads->ads_attachment[0]->name]) }}
@endif
@stop
@section('content')
             <div class="col-md-7">

  <div class="single-property"> 
      <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir" data-yashareTheme="counter"></div>
              <h2 class="row-content">
                @if($ads->city)
                  <span class="location"> Город {{ $ads->city->city_name }}</span>
                @endif
              </h2>
              <div class="price">
                  <strong><li class='fa fa-rub'></li></strong>
                  <span>{{ $ads->price }}</span>
              </div>
                <br />
              <div class="price">
                  <strong><li class="fa fa-phone"></li></strong>
                  @if($ads->phone)
                      <span>{{$ads->phone}}</span>
                  @else
                      <span>Нет телефона</span>
                  @endif
              </div>

             <!-- <div class="property-amenities clearfix"> <span class="area"><strong>For</strong>Rent</span> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div> -->
              @if(count($ads->ads_attachment))
              <div class="property-slider">
                <div id="property-images" class="flexslider">
                  <ul class="slides">
                    @foreach($ads->ads_attachment as $attachment)
                      <li class="item" >
                      {!! HTML::image( url('img', ['advertisements', $attachment->name]), $attachment->comment, ['class'=>'slide-image'])!!} 

                      </li>
                    @endforeach
                  </ul>
                </div>

                @if(count($ads->ads_attachment) > 1)
                <div id="property-thumbs" class="flexslider">
                  <ul class="slides">
                    @foreach($ads->ads_attachment as $attachment)
                        <li class="item">
                            {!! HTML::image( url('img', ['advertisements', $attachment->name]).'?w=150&h=150&fit=crop', $attachment->comment) !!} 
                        </li>
                    @endforeach                       
                  </ul>
                </div>
                @endif


              </div>
              @endif

              <div class="tabs">
                <ul class="nav nav-tabs">
                  <li class="active"> <a data-toggle="tab" href="#description"> Описание </a> </li>
                </ul>
                <div class="tab-content">
                  <div id="description" class="tab-pane active">
                      <div class="row-content">{!! $ads->text !!}</div>
                     {{-- @if($ads->phone)
                          <span><i class="fa fa-phone"></i> {{$ads->phone}} </span><br />
                      @else
                          <span><i class="fa fa-phone"></i> Нет телефона </span>
                      @endif

                      @if($ads->price)
                          <span><i class="fa fa-rub"></i> {{$ads->price}} руб.</span>
                      @else
                          <span><i class="fa fa-rub"></i> Нет цены </span>
                      @endif--}}
                                      <!--  <span><a href="#"><i class="fa fa-comment"></i> 12</a></span> -->
                              </span>
                  </div>
                 
                </div>
              </div>

              <div class="agent" style="padding: 10px">
              		<div class="row">
                        @if($ads->user->profile->avatar)
                    	<div class="col-md-2">
                            {!! HTML::image(url('img', ['profile', $ads->user->profile->avatar->name]).'?w=75&h=75&fit=crop', null) !!}
                        </div>
                        @endif

                    	<div class="col-md-6">
                      	<h5><a href="{{ url('profile',$ads->user->user_name ) }}"><i class="fa fa-male"></i> {{ $ads->user->user_name }}</a></h5>
                            <p class="badge">Продавец</p>
                         <p>{{$ads->user->profile->about}}</p>
                          <div class="agent-contacts clearfix">
                           	<ul>
                           		<li><a href="{{$ads->user->profile->vkcom}}"><i class="fa fa-vk"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                         	</ul>
                          </div>
                      </div>
                  </div>

              </div>
            </div>
           
            @if($ads->comments)
            <section class="post-comments" id="comments">
              <h3><i class="fa fa-comment"></i> Комментарии ({{ count($ads->comments) }} )</h3>
              <ol class="comments">
               @foreach($ads->comments as $comment)
                <li id='comment{{$comment->id}}'>
                  <div class="post-comment-block">
                    @if($comment->user->profile->avatar)

                    <div class="img-thumbnail">
                     {!! HTML::image(url('img', ['profile', $comment->user->profile->avatar->name]).'?w=50&h=50&fit=crop', null) !!}     
                    </div>
                    @endif
                      <h5><a href='{{ url('profile', $comment->user->user_name ) }}'>{{ $comment->user->user_name }}</a></h5>
                    <span class="meta-data">{{ $comment->created_at }}</span>
                    <p class='row-content'> {{ $comment->text }}</p>
                  </div>
                </li>
                @endforeach
              </ol>
            </section>
            @endif
           @if(Auth::user())
            <section class="post-comment-form">
              <h3><i class="fa fa-share"></i> Оставьте комментарий</h3>
              {!! Form::open(['url'=>'comments']) !!}
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12">
                      {!! Form::textarea('text', null, ['class'=>'form-control input-lg', 'cols'=>8, 'rows'=>4, 'placeholder'=>'Текст', 'required'=>'']) !!}
                      {!! Form::hidden('ads_id', $ads->id) !!}
                      {!! Form::hidden('user_id', $ads->user->id) !!}
                        {!! Form::hidden('type', 1) !!}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-12">
                      {!! Form::submit( 'Отправить', ['class'=>'btn btn-primary btn-lg']) !!}
                    </div>
                  </div>
                </div>
              {!! Form::close() !!}
            </section>
           @endif
             </div>
@stop
<!---
 <div class="col-md-8 posts-archive">
       <header class="single-post-header clearfix">
              <h2 class="post-title">{#{ $ads->title }#</h2>
            </header>
            <article class="post-content">
                  <div class="post-meta meta-data">
                      <span><i class="fa fa-calendar"></i>{# $ads->created_at #}</span>
                      <span><i class="fa fa-user"></i>
                          <a href="{# url('profile', $ads->user->user_name) #}">
                              {# $ads->user->user_name #}
                          </a>
                      </span>
                    <span><i class="fa fa-tag"></i> Category: <a href="#">{# $ads->category->title #} </a></span>
                    <span><a href="#comments"><i class="fa fa-comment"></i> 188 Comments</a></span>
                </div>
              <div class="featured-image"> <img src="/uploads/ads_attachments/{# $ads->ads_attachment[0]->name #}" alt=""> </div>
              <p class="row-content">
                  {# $ads->text #}
              </p>
            </article>
      
         
    </div>
 -->