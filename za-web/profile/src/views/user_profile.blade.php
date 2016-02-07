@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
Профиль
@stop
@section('js')

@stop
@section('content')
<div class="col-md-7">
  <div class="single-agent">

    <h2 class="page-title">
        {{ $data->name }} {{ $data->last_name }}
    </h2>
    <div class="row">
  <div class="col-md-6 col-sm-6">
        @if($data->avatar)

                <img class="img-thumbnail" alt="{{ $data->name }} {{ $data->last_name }}" src="{{ url('img', ['profile', $data->avatar->name ]) }}?w=600&h=400&fit=crop">
        @else
                <img class="img-thumbnail" alt="{{ $data->name }} {{ $data->last_name }}" src="http://placehold.it/600x400">

        @endif

        </div>
      <div class="col-md-6 col-sm-6">
        <div class="agent-contact-details">

          <ul class="list-group">
            <li class="list-group-item">
                @if($data->city_id)
                    <span style="float:right" >{{ $data->city->city_name }}</span>
                @else
                    <span style="float:right">Не указан</span>
                @endif

              Город
            </li>
            <li class="list-group-item">

                @if($data->phone)
                    <span style="float:right" >{{ $data->phone}}</span>
                @else
                    <span style="float:right">Не указан</span>
                @endif
              Телефон
            </li>
            <li class="list-group-item">

                    <span style="float:right" >{{ $data->user->email}}</span>
              Почта
            </li>
            <li class="list-group-item">
              <div class="social-icons">
                <a href="{{$data->vkcom}}">
                  <i class="fa fa-vk">
                  </i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter">
                  </i>
                </a>
                <a href="#">
                  <i class="fa fa-google-plus">
                  </i>
                </a>
                <a href="#">
                  <i class="fa fa-envelope">
                  </i>
                </a>

              </div>
            </li>
          </ul>
        </div>
      </div>

      <!--
      <div class="col-md-6 col-sm-6">
        <div class="agent-contact-form">
          <h4>
            Contact Form
          </h4>
          <form>
            <input type="email" name="Email Address" class="form-control" placeholder="Email Address">
            <textarea name="comments" class="form-control" placeholder="Your message" cols="10" rows="5">
            </textarea>
            <button type="submit" class="btn btn-primary pull-right">
              Submit
            </button>
          </form>
        </div>

      </div>

        -->
    </div>
  </div>
  <div class="spacer-20">
  </div>
  <!-- Start Related Properties -->
  <h3>
    @if(count($data['advertisements']) > 0)
    Последнее объявления пользователя
    @endif

  </h3>
  <hr>
  <div class="property-grid">
    <ul class="grid-holder col-3">
      @foreach(\App\Models\Advertisement::approved()->with('ads_attachment')->with('city')->where('user_id', $data->user_id)->limit(3)->get() as $ads)
      <li class="grid-item type-rent">
        <div class="property-block">

          <a href="#" class="property-featured-image">
              @if(isset($ads->ads_attachment[0]))
                 <img src="{{ url('img', ['advertisements', $ads->ads_attachment[0]->name]) }}?w=200&h=150&fit=crop" alt="">
              @endif
            <span class="images-count">
              <i class="fa fa-picture-o">
              </i>
              {{ count($ads['ads_attachment']) }}
            </span>



          </a>
          <div class="property-info">
            <h4 class="row-content">
              <a href="{{ url('ads',  $ads["id"]) }}">
              {{ $ads["title"] }}
              </a>
            </h4>
            <span class="location">
                @if($ads["city"]['city_name'])
                    {{ $ads["city"]['city_name'] }}
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
          </div>
            <!--
          <div class="property-amenities clearfix">

            <span class="area">
              <strong>
                5000
              </strong>
              Area
            </span>

            <span class="baths">
              <strong>
                3
              </strong>
              Baths
            </span>

            <span class="beds">
              <strong>
                3
              </strong>
              Beds
            </span>

            <span class="parking">
              <strong>
                1
              </strong>
              Parking
            </span>

          </div>
            -->
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
<!-- Start Sidebar -->
  <!-- Agents Widget
  <div class="sidebar right-sidebar col-md-3">

  <div class="widget sidebar-widget widget-agents">
    <h3 class="widgettitle">
      More Agents
    </h3>
    <ul>
      <li>
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-5">
            <a href="agent-detail.html">
              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="Brooklyn Coyle" class="img-thumbnail">
            </a>
          </div>
          <div class="col-md-7 col-sm-7 col-xs-7">
            <strong>
              <a href="agent-detail.html">
                Brooklyn Coyle
              </a>
            </strong>
            <span class="badge">
              <i class="fa fa-phone">
              </i>
              080 378678 90
            </span>
          </div>
        </div>
      </li>
      <li>
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-5">
            <a href="agent-detail.html">
              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="Ben Patel" class="img-thumbnail">
            </a>
          </div>
          <div class="col-md-7 col-sm-7 col-xs-7">
            <strong>
              <a href="agent-detail.html">
                Ben Patel
              </a>
            </strong>
            <span class="badge">
              <i class="fa fa-phone">
              </i>
              080 378678 90
            </span>
          </div>
        </div>
      </li>
      <li>
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-5">
            <a href="agent-detail.html">
              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="Emma Dumas" class="img-thumbnail">
            </a>
          </div>
          <div class="col-md-7 col-sm-7 col-xs-7">
            <strong>
              <a href="agent-detail.html">
                Emma Dumas
              </a>
            </strong>
            <span class="badge">
              <i class="fa fa-phone">
              </i>
              080 378678 90
            </span>
          </div>
        </div>
      </li>
    </ul>
  </div>
  -->
  <!-- Featured Properties Widget
  <div class="widget sidebar-widget widget-properties">
    <h3 class="widgettitle">
      Featured Properties
    </h3>
    <ul>
      <li>
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-5">
            <a href="property-detail.html">
              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail">
            </a>
          </div>
          <div class="col-md-7 col-sm-7 col-xs-7">
            <strong>
              <a href="property-detail.html">
                116 Waverly Place
              </a>
            </strong>
            <div class="price">
              <strong>
                $
              </strong>
              <span>
                2800 Monthly
              </span>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-5">
            <a href="property-detail.html">
              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail">
            </a>
          </div>
          <div class="col-md-7 col-sm-7 col-xs-7">
            <strong>
              <a href="property-detail.html">
                70 Greene Street
              </a>
            </strong>
            <div class="price">
              <strong>
                $
              </strong>
              <span>
                500000
              </span>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-5">
            <a href="property-detail.html">
              <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="" class="img-thumbnail">
            </a>
          </div>
          <div class="col-md-7 col-sm-7 col-xs-7">
            <strong>
              <a href="property-detail.html">
                55 Warren Street
              </a>
            </strong>
            <div class="price">
              <strong>
                $
              </strong>
              <span>
                300000
              </span>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  </div>

   -->


@stop