@extends('admin.adminLayout')
@section('title')
    Пользователи
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Транзакции</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все транзакции
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <thead>
                        <tr>
                            <th>Пользователь</th>
                            <th>Email</th>
                            <th>№ Транзакции</th>
                            <th>Описание</th>
                            <th>Сумма</th>
                            <th>Операция</th>
                            <th>Статус</th>
                            <th>Создана</th>
                            <th>Обновлена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            @if($transaction->status == 0)
                                <tr class="danger">
                                    <td>{{$transaction->user->user_name}}</td>
                                    <td>{{$transaction->user->email}}</td>
                                    <td>{{$transaction->uid}}</td>
                                    <td>{{$transaction->description}}</td>
                                    <td>{{$transaction->balance}} <i class="fa fa-ruble"></i> </td>
                                    <td>{{$transaction->operation}}</td>
                                    <td>{{$transaction->status}}</td>
                                    <td>{{$transaction->created_at}}</td>
                                    <td>{{$transaction->updated_at}}</td>
                                </tr>
                                @else
                            <tr class="success">
                                <td>{{$transaction->user->user_name}}</td>
                                <td>{{$transaction->user->email}}</td>
                                <td>{{$transaction->uid}}</td>
                                <td>{{$transaction->description}}</td>
                                <td>{{$transaction->balance}} <i class="fa fa-ruble"></td>
                                <td>{{$transaction->operation}}</td>
                                <td>{{$transaction->status}}</td>
                                <td>{{$transaction->created_at}}</td>
                                <td>{{$transaction->updated_at}}</td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->

            <div class="panel-footer">
                <div class="text-center">{!! $transactions->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
