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
        @foreach($shops->items as $item)
            <div class="col-lg-4">
                <div class="well">
                    <h4><span class="label label-success">Товар создан: {{ $item->created_at }}</span></h4>

                    <h4><span class=""><strong>Название товара:</strong> {{ upperFirstLetter($item->name) }}</span></h4>
                    <h4><strong>Описание:</strong> </h4> <p class="more">{{ $item->description }}</p>
                    <hr>
                    @if ($item->attachment)
                        <img src="{{ $item->attachment->url }}" class="thumbnail" alt="">
                    @else
                        Изображение отсутствует
                    @endif

                    <hr>
                    <div><h4><span class="label label-success">Цена:</span>
                            <span> {{ $item->price }} <i class="fa fa-rub"></i></span>
                            @if($item->art_number)
                                <span style="float: right; font-size: small">Артикул № <strong>{{ $item->art_number }}</strong></span>
                            @endif
                        </h4> </div>
                    <hr>
                        {!! Form::open(array('url' => 'shopitems/' . $item->id, 'class' => 'pull-right')) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Удалить товар', array('class' => 'btn btn-danger btn-sm')) !!}
                        {!! Form::close() !!}
                    <a href="/shopitems/{{$item->id}}/edit" class="btn btn-success btn-sm">Редактировать товар</a>
                </div>
            </div>
        @endforeach
@endsection
