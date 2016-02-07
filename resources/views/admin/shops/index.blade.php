@extends('admin.adminLayout')
@section('title')
    Магазины
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Магазины</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все магазины
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Создатель</th>
                            <th>Телефон магазина</th>
                            <th>Город для показа</th>
                            <th>Кол-во товаров</th>
                            <th>Фото</th>
                            <th>Создан</th>
                            <th>Активен до</th>
                            <th>Заблокирован</th>
                            <th>&nbsp;</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($shops as $shop)
                            <tr>
                                <td>{{$shop->id}}</td>
                                <td>{{$shop->user->user_name}}</td>
                                <td>{{ $shop->profile->phone }}</td>
                                <td>{{$shop->city->city_name}}</td>
                                <td>{{$shop->capacity}}</td>
                                <td>
                                    @if ($shop->attachment)
                                        <img src="{{ $shop->attachment->url }}?w=120&h=100" alt="">
                                    @else
                                        Изображение отсутствует
                                    @endif
                                </td>
                                <td>{{ $shop->created_at }}</td>
                                <td>{{ $shop->paid_at }} <a href="{{ url("admin/shops/$shop->id/edit") }}"> Изменить</a></td>
                                <td>
                                    @if (1 == $shop->blocked)
                                        <i class="fa fa-hand-o-down"> Да</i>
                                    @else
                                            <i class="fa fa-hand-o-up"> Нет</i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">

                                        {!! Form::open(['route'=>['admin.shops.destroy',$shop->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <button type="submit" class="btn btn-danger confirm-btn" data-toggle="tooltip" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}

                                        {!! Form::open(['route'=>['admin.shop.block',$shop->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'POST']) !!}
                                        @if (0 == $shop->blocked)
                                            {!! Form::hidden('blocked', 1) !!}
                                            <button type="submit" class="btn btn-danger confirm-block" style="margin-top: 5px;" data-toggle="tooltip" data-original-title="Заблокировать"><i class="fa fa-ban"></i></button>
                                        @else
                                            {!! Form::hidden('blocked', 0) !!}
                                            <button type="submit" class="btn btn-success confirm-unblock" style="margin-top: 5px;" data-toggle="tooltip" data-original-title="Разблокировать"><i class="fa fa-ban"></i></button>
                                        @endif
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->

            <div class="panel-footer">
                <div class="text-center"></div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
