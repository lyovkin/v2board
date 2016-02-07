@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Магазины
@stop

@section('content')
    <div class="col-md-7">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="block-heading">
           {{-- @if(Auth::check())
                <a href="{{route('shops.create')}}" class="btn btn-sm btn-primary pull-right">Создать магазин
                    <i class="fa fa-long-arrow-right"></i></a>
            @endif--}}
                <h4><span class="heading-icon"><i class="fa fa-comment"></i></span>Магазины</h4>
            <p class="h5">У Вас есть возможность покупки интернет-магазина, для этого необходимо пополнить баланс и купить магазин в платных услугах.</p>
        </div>
            <br />
        <div class="agents-listing">
            <hr />
            @if(isset($category))
            <div class="block-heading">
                <p class="h4 text-center" style="font-size: 23px; padding-top: 10px;">Магазины из категории
                    <span class="badge">{{ \App\Models\ShopCategories::find($category)->name }}
                        <i class="fa fa-cart-plus"></i> </span></p>
            </div>
            @endif

            <ul>
                @foreach($shops as $shop)
                <li class="col-md-12">
                    <div class="col-md-4">
                        <a href="{{ route('shops.show', $shop->id) }}" class="agent-featured-image">
                            @if ($shop->attachment)
                                <img src="{{ $shop->attachment->url }}?w=600&h=400" alt="">
                            @else
                                Изображение отсутствует
                            @endif
                        </a>
                    </div>
                    <div class="col-md-8">
                        @if($shop->blocked == 1)
                            <p class="h4"> Магазин заблокирован, обратитесь к администратору</p>
                        @endif
                        <div class="agent-info">
                            <div class="counts"><span><a href="{{route('shops.show', $shop->id)}}" style="color: #ffffff; text-decoration: none"> Товары</a> </span><strong>{{ count($shop->items) }}</strong></div>
                            <h3><a href="{{ route('shops.show', $shop->id) }}">{{  $shop->profile->name }}</a>

                            @if(\Request::is('shops/my'))</h3><p class="h5" style="color: red">Магазин активен до {{ $shop->paid_at }}


                                @if($shop->paid_at <= date('Y-m-d H:i:s'))

                                    {!! Form::open(['url'=>["shops/$shop->id/extend"],'role'=>'form', 'method' => 'POST']) !!}
                                        <button type="submit" class="btn btn-success btn-sm"> Продлить на 1 месяц?</button>
                                    {!! Form::close() !!}
                                        <br />
                                    <span style="color: green;">Стоимость продления составляет
                                        @if($shop->capacity == 500)
                                            500 <i class="fa fa-ruble"></i>
                                        @elseif($shop->capacity == 2000)
                                            1000 <i class="fa fa-ruble"></i>
                                        @endif
                                        и зависит от кол-ва товаров в магазине
                                    </span>

                                @endif

                            @endif
                            <p class="more">
                                {{ $shop->profile->description }}
                            </p>


                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
        {!! $shops->render() !!}
    </div>
@stop
