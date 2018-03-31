@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Магазины
@stop

@section('css')
    <style>
       .btn-primary:hover {
           background: #b94a48;
       }
    </style>
@endsection

@section('content')
    <div class="col-md-7">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-comment"></i></span>Магазины</h4>
                <p class="h5">У Вас есть возможность покупки интернет-магазина.</p>
                <p class="h5">Для этого необходимо пополнить баланс и купить магазин в платных услугах.</p>
        </div>
            <br />
            <br />
            <h3 style="padding-top: 20px;">Категории магазинов</h3>
        <div class="row">
            @foreach($links as $link)
                <form action="{{ action('ShopCategoriesController@filter') }}" method="post"
                      class="col-md-4" style="padding-bottom: 10px;">

                        <input type="hidden" name="id" value="{{ $link->id }}">

                        <button
                                class="btn btn-primary form-group"
                                type="submit"
                                style="padding-right: 155px; padding-bottom: 30px"
                                ><span style="position: absolute">{{ $link->name }}</span>
                        </button>

                </form>
           {{-- <a href="#" class="list-group-item">First item</a>--}}
            @endforeach
        </div>

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
                                    <h3><p class="h5" style="color: red">Магазин просрочен на
                                {{ \Carbon\Carbon::parse($shop->paid_at)->diffInDays(\Carbon\Carbon::now()) }} дней.</p></h3>
                                    {!! Form::open(['url'=>["shops/$shop->id/extend"],'role'=>'form', 'method' => 'POST']) !!}
                                    {!! Form::label('months', 'Активировать (продлить)') !!}
                                        <select name='months' class='form-control' required="required">
                                            @for($i=1; $i<=12; $i++)
                                                <option value='{{ $i }}'>{{ $i . ' мес.' }}</option>
                                            @endfor
                                        </select>
                                        <button type="submit" class="btn btn-success btn-sm"> Продлить?</button>
                                    {!! Form::close() !!}
                                        <br />
                                    <span style="color: green;">Стоимость продления составляет
                                        @if($shop->capacity == 500)
                                            500 <i class="fa fa-ruble"> * кол-во месяцев </i>
                                        @elseif($shop->capacity == 2000)
                                            1000 <i class="fa fa-ruble"> * кол-во месяцев </i>
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
