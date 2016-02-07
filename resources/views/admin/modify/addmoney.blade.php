@extends('admin.adminLayout')
@section('title')
    Изменить баланс
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Изменить баланс</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Баланс
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('partials.errors.basic')

                            {!! Form::model($user,['route'=>['admin.user.storebalance'],
                            'method' => 'post',
                            'role'=>'form']) !!}
                            @include('admin.modify._form_addmoney')
                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection