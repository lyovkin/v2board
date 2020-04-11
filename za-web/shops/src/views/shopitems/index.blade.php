@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app2')

@section('title')
    Все товары
@endsection

@section('css')
    <style>
        
    </style>
@endsection

@section('content')
        <div class="col-sm-10">
            <a href="{{ url('/shops/my') }}"> Назад к магазинам</a>
                <h4 style="font-size: 24px">Все товары</h4>
        </div>
        <div class="property-grid">
            <ul class="grid-holder col-3" >
        @foreach($shops->items as $item)
            <li class="grid-item type-rent">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="color: red">Товар создан: {{ $item->created_at->format('d.m.Y H:i') }}</h4>
                        <h4 style="color: red">{{ $item->name }}
                            @if($item->art_number)
                                <span style="float: right; font-size: small">Артикул № <strong>{{ $item->art_number }}</strong></span>
                            @endif
                        </h4>
                    </div>
                    <div class="panel-body">
                        @if ($item->attachment)
                            <a href="{{ $item->attachment->url }}" rel="prettyPhoto[{{ $item->id }}]">
                                <div style="text-align: center;">
                                    {!! HTML::image($item->attachment->url, '',
                                 ['style' => 'height: 200px; width: 300px;']) !!}
                                </div>
                            </a>
                        @else
                            <br />
                            <h4 style="text-align: center">Изображение отсутствует</h4>
                        @endif
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-default" data-toggle="collapse"
                                data-target="#item-{{ $item->id }}">Описание
                            <i class="fa fa-comment" aria-hidden="true"></i>
                        </button>

                        <div id="item-{{ $item->id }}" class="collapse">
                            <p class="description blacked-text" style="">
                                <br/>
                                {{ !empty($item->description) ? $item->description : 'Нет описания' }}
                            </p>
                        </div>
                        <hr>
                        <div class="price"><span>{{ $item->price }} <i class="fa fa-rub"></i></span></div>
                        <div class="shop__cart-button" style="float:right">
                            @if(auth()->user()->id === $item->shop->user_id)
                                <a class="btn btn-warning"
                                   href="{{ route('shopitems.edit', ['id' => $item->id]) }}" style="height:30px;">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> Редактировать</i>
                                </a>
                            @endif

                    </div>
                </div>
            </li>
        @endforeach
            </ul>
        </div>
@endsection
