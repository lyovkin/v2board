@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app2')
@section('title')
    {{ $shops->profile->name }}
@endsection

@section('content')
    <div class="col-md-10" ng-app="shop">
        <div class="single-agent">

            <div class="counts pull-right"><span>Товары</span><strong>{{ count($shops->items) }}</strong></div>
            @if(Auth::check())
                @if($shops->user_id == Auth::user()->id)
                    <a href="{{ route('shops.edit', ["id"=>$shops->id]) }}" class="btn btn-warning btn-sm" >Редактировать магазин</a>
                @endif
            @endif
            <h2 class="page-title">{{ $shops->profile->name }}</h2>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    @if($shops->attachment)
                    <img src="{{ $shops->attachment->url }}?w=450" alt="{{ $shops->profile->name }}" class="img-thumbnail">
                    @endif
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="well">
                    <strong>Описание: </strong><p class=""> {{ $shops->profile->description }}</p>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="agent-contact-details">
                        <p class="h4">Контакты</p>
                        <ul class="list-group">
                            <li class="list-group-item">
                                @if($shops->profile->phone )
                                    <span class="badge">{{ $shops->profile->phone }}</span>
                                @else
                                    <span style="float:right"><i>Не указано</i></span>
                                @endif
                                    Рабочий телефон
                            </li>
                            <li class="list-group-item">
                                @if($shops->profile->email )

                                <span class="badge">{{ $shops->profile->email }}</span>
                                @else
                                    <span style="float:right"><i>Не указано</i></span>
                                @endif
                                    Почта
                            </li>
                            <li class="list-group-item">
                                @if($shops->city->city_name)
                                    <span class="badge">{{ $shops->city->city_name }}</span>
                                @else
                                    <span style="float:right"><i>Не указано</i></span>
                                @endif
                                    Город
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="spacer-20"></div>
        <!-- Start Related Properties -->
        <h3>Товары
            @if(Auth::check())
                @if($shops->user_id == Auth::user()->id && $shops->canAddItem())
                    @if(!empty($shops->items))
                    <a href="{{ route('shopitems.show', ["shop_id"=>$shops->id])}}" class="btn btn-default btn-sm"> Все товары</a>
                    @endif
                    <a href="{{ url("shopitems/create", ["shop_id"=>$shops->id]) }}" class="btn btn-primary btn-sm">Добавить</a>

                @endif
            @endif
        </h3>
        <div ng-controller="CartCtrl">
            <div class="shop__cart" ng-show="cart.getTotalItems() > 0">
                <div class="well">
                    <i class="fa fa-shopping-cart" style="font-size:30px; "></i>
                    <a href="{{ url('cart') }}"  >Корзина [[ cart.getSubTotal() ]] рублей ([[ cart.getTotalItems() ]])</a>
                    <strong><a data-clear-cart="" href="">Очистить</a></strong>
                </div>
            </div>
            <hr>
            <div class="property-grid">

                <ul class="grid-holder col-3" >
                    @foreach($items as $item)
                    <li class="grid-item type-rent" >
                        <div class="property-block">
                            @if ($item->attachment)
                                <img src="{{ $item->attachment->url }}?w=400&h=300" alt="">
                            @else
                                <br />
                                <h4 style="text-align: center">Изображение отсутствует</h4>
                            @endif

                            <div class="property-info">
                                <h4 style="color: red">{{ $item->name }}
                                    @if($item->art_number)
                                        <span style="float: right; font-size: small">Артикул № <strong>{{ $item->art_number }}</strong></span>
                                    @endif
                                </h4>
                                <hr>
                                <h4>Описание: </h4> <p class="more">{{ $item->description }}</p>  <hr>
                                <div class="price"><span>{{ $item->price }} <i class="fa fa-rub"></i></span></div>
                                <div class="shop__cart-button" style="float:right">
                                    <input  type='text' ng-model='quantity' style="width: 30px">
                                    <span class="shop__in-cart" data-in-cart="{{ $item->id }}">

                                    </span>
                                    <button class="btn btn-success shop__add-cart"  href="#" data-add-cart="{{ $item->id }}" data-item-name="{{ $item->name }}"
                                            data-item-price="{{ $item->price }}"
                                            @if($item->attachment)
                                                data-item-partner-name="{{ $item->shop->profile->name }}"
                                            @endif
                                            data-item-partner="{{ $item->shop->id }}"
                                            data-toggle="popover">Купить</button><br>

                                </div>

                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="text-center">{!! $items->render() !!}</div>
        </div>
    </div>
@stop
