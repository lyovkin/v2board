@extends('layouts.app')
@section('title')
    Профиль
@stop
@section('js')

@stop

@section('content')
    <div class="col-md-7">
        <div class="single-agent">
            <div class="well">
                @if(count($transactions))
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>№ Платежа</th>
                            <th>Описание</th>
                            <th>Сумма</th>
                            <th>Операция</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($transactions as $transaction)
                        @if($transaction->status != 0)
                            @if($transaction->user_id == Auth::user()->id)
                            <tr>
                                <td>{{ $transaction->uid }}</td>
                                <td>{{ $transaction->description }}</td>
                                <td>{{ $transaction->balance }} <i class="fa fa-ruble"></i></td>
                                <td>{{ $transaction->operation }}</td>
                                <td>{{ $transaction->created_at }}</td>
                            </tr>
                             @endif
                        @endif

                    @endforeach
                            </tbody>
                    </table>
                @endif

        </div>
    </div>
</div>
@stop