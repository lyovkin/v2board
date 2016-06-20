@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app2')
@section('title')
    {{ $shops->profile->name }}
@endsection

@section('css')
    <link href="/css/category_items.css" rel="stylesheet">

    <style>
        .list-group-horizontal .list-group-item {
            display: inline-block;
        }
        .list-group-horizontal .list-group-item {
            margin-bottom: 0;
            margin-left:-4px;
            margin-right: 0;
        }
        .list-group-horizontal .list-group-item:first-child {
            border-top-right-radius:0;
            border-bottom-left-radius:4px;
        }
        .list-group-horizontal .list-group-item:last-child {
            border-top-right-radius:4px;
            border-bottom-left-radius:0;
        }
        .blacked-text {
            color: #000;
        }
    </style>

@endsection

@section('content')
    <div class="col-md-10" ng-app="shop">
        <div class="single-agent">

            <h2 class="page-title text-center">{{ $shops->profile->name }}</h2>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    @if($shops->attachment)
                    <img src="{{ $shops->attachment->url }}?w=375" alt="{{ $shops->profile->name }}" class="img-thumbnail">
                    @endif
                </div>
                <div class="col-md-6 col-sm-6">
                    <div>
                        <p class="h4 blacked-text">Информация о магазине</p>
                        <ul class="list-group blacked-text">
                            <li class="list-group-item">
                                <i class="fa fa-calculator"></i> Всего товаров в магазине
                                <span style="float:right;">{{ count($shops->items) }}</span>
                            </li>
                            <li class="list-group-item">
                                @if($shops->profile->phone )
                                    <span style="float:right">{{ $shops->profile->phone }}</span>
                                @else
                                    <span style="float:right">Не указано</span>
                                @endif
                                <i class="fa fa-mobile"></i> Телефон
                            </li>
                            <li class="list-group-item">
                                @if($shops->profile->email )
                                    <span style="float:right">{{ $shops->profile->email }}</span>
                                @else
                                    <span style="float:right">Не указано</span>
                                @endif
                                <i class="fa fa-envelope-o"></i> Email
                            </li>
                            <li class="list-group-item">
                                @if($shops->city->city_name)
                                    <span style="float:right">{{ $shops->city->city_name }}</span>
                                @else
                                    <span style="float:right">Не указано</span>
                                @endif
                                <i class="fa fa-building-o"></i> Город
                            </li>
                            <li class="list-group-item">
                                <p><i class="fa fa-book"></i> Описание</p>
                                @if($shops->profile->description)
                                    <span>{{ $shops->profile->description }}</span>
                                @else
                                    <span style="float:right; position: absolute;top: 10px;right: 12px;">Не указано</span>
                                @endif

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <span class="h4 blacked-text" style="vertical-align: 10px;">Категории магазина</span>
                    <div class="list-group list-group-horizontal blacked-text">
                        @foreach($categories as $cat)
                        <p href="#" class="list-group-item active">{{ $cat->name }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <span class="h4 blacked-text" style="vertical-align: 10px;">Фильтр товаров по категориям</span>
                        <form action="{{url('filtered', ["id" => $shops->id])}}" method="post"
                              name="category" style="padding-bottom: 10px;">
                            <select name="cat_id" class="form-control blacked-text" id="selectElementId">
                                <option>Выберете категорию...</option>
                                <option value="0">Все товары</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </form>
                </div>
            </div>
        </div>
        <p class="h4 text-center blacked-text">Товары
            @if(Auth::check())
                @if($shops->user_id == Auth::user()->id && $shops->canAddItem())
                    <p class="primary" style="font-size: 11px; color: red;">* Уважаемые владельцы магазина,
                        перед созданием товара, создайте категории для Ваших товаров.
                        Это можно сделать, нажав на кнопку "Добавить категорию товара".</p>
                <div class="btn-group">

                    @if(Auth::check())
                        @if($shops->user_id == Auth::user()->id)
                            <a href="{{ route('shops.edit', ["id"=>$shops->id]) }}" type="button"
                               class="btn btn-default"> Редактировать магазин</a>
                        @endif
                    @endif

                    @if(!empty($shops->items))
                        <a href="{{ route('shopitems.show', ["shop_id"=>$shops->id])}}" type="button"
                           class="btn btn-default"> Все товары</a>
                    @endif

                        <a href="{{ url("/items_category", ["shop_id"=>$shops->id]) }}" type="button"
                           class="btn btn-default">Все категории</a>

                    <a href="{{ url("shopitems/create", ["shop_id"=>$shops->id]) }}" type="button"
                       class="btn btn-default">Добавить товар</a>

                    <form action="{{ route('getShop') }}" method="post">
                        <input type="hidden" value="{{ $shops->id }}" name="shop_id">
                        <button type="submit" class="btn btn-default" style="position: absolute;">Добавить категорию товара</button>
                    </form>
                    <a href="{{ url("shops/$shops->id/mass_upload") }}" type="button" class="btn btn-default">Массовое заполнение товаров</a>
                        {{-- Oauth VK button--}}
                    <a href="{{ Config::get('vk.url').'client_id='.Config::get('vk.client_id').'&display='.Config::get('vk.display')
                     .'&redirect_uri='.Config::get('vk.redirect_uri').'&scope='.Config::get('vk.scope').'&response_type='
                     .Config::get('vk.response_type').'&v='.Config::get('vk.v')}}"
                       type="button" class="btn btn-default">Заполнение товаров из <span class="fa fa-vk"></span> </a>
                        {{--end button--}}
                </div>
                @endif
            @endif
        </p>
        <div ng-controller="CartCtrl">
            <div class="shop__cart" ng-show="cart.getTotalItems() > 0">
                <div class="well" style="padding: 15px 25px 0px;">
                    <h4 href="{{ url('cart') }}">
                        <i class="fa fa-cart-arrow-down fa-2x"></i>
                       В корзине товаров: <strong>[[ cart.getTotalItems() ]]</strong> на сумму: <strong>[[ cart.getSubTotal() ]]</strong> рублей</h4>
                    <h4><a class="btn btn-success" href="{{ url('cart') }}">Оформить заказ</a> или
                        <a class="btn btn-primary" style="background-color: #00b3ee" href="{{ url('shops') }}"> Продолжить покупки</a> </h4>
                    <h4 style="padding-top: 25px;"><a data-clear-cart="" href="" >Удалить товары <i>&Cross;</i></a></h4>
                </div>
            </div>
            <hr>
            @if($items->isEmpty())
                <div class="well"><h5 class="text-center text-danger">В этой категории нет товаров</h5></div>
            @endif
            <div class="property-grid">
                <ul class="grid-holder col-3" >
                    @foreach($items as $item)
                    <li class="grid-item type-rent">
                        <div class="property-block">
                            @if ($item->attachment)
                                <a href="{{$item->attachment->url}}" rel="prettyPhoto[{{$item->id}}]">
                                    {!! HTML::image($item->attachment->url.'?w=300&h=300&fit=crop', '',
                                    ['class' => 'img-thumbnail img-responsive']) !!}
                                </a>
                                {{--<img src="{{ $item->attachment->url }}?w=200&h=200" class="img-thumbnail" alt="">--}}
                            @else
                                <br />
                                <h4 style="text-align: center">Изображение отсутствует</h4>
                            @endif

                            <div class="property-info" style="word-wrap: break-word;">
                                <h4 style="color: red">{{ $item->name }}
                                    @if($item->art_number)
                                        <span style="float: right; font-size: small">Артикул № <strong>{{ $item->art_number }}</strong></span>
                                    @endif
                                </h4>
                                <hr>
                                <p class="h4 blacked-text">Описание: </p>
                                <p class="description blacked-text" style="">{{ $item->description }}</p>
                                <hr>
                                <div class="price"><span>{{ $item->price }} <i class="fa fa-rub"></i></span></div>
                                <div class="shop__cart-button" style="float:right">
                                    <input  type='text' ng-model='quantity' style="width: 30px">
                                    <span class="shop__in-cart" data-in-cart="{{ $item->id }}">

                                    </span>
                                    <button class="btn btn-success shop__add-cart"  href="#"
                                            data-img="{{ $item->attachment->url }}"
                                            data-description="{{ mb_substr($item->description, 0, 100) }}"
                                            data-add-cart="{{ $item->id }}"
                                            data-item-name="{{ $item->name }}"
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

@section('js')
    <script>
        $('.description').readmore(
                {
                    speed: 500,
                    collapsedHeight: 140,
                    lessLink: '<a href="#">Свернуть описание</a>',
                    moreLink: '<a href="#">Открыть полное описание</a>',
                    embedCSS: false
                }
        );
    </script>
    <script>
        $('#selectElementId').change(
                function () {
                    $(this).closest('form').trigger('submit');
                }
        )
    </script>
@endsection
