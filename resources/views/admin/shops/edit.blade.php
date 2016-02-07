@extends('admin.adminLayout')
@section('title')
    Редактировать дату магазина
@stop
@section('js')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker().change(function() {
                $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );;
            });
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать дату активности магазина</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <script>
        function check_pick()
        {
            return false;
        }

    </script>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('partials.errors.basic')
                            {!! Form::model($shop,['route'=>['admin.shops.update','id' => $shop->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}
                            @include('admin.shops._form')

                        </div>
                        <!-- SUBMIT -->
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                {!! Form::submit('Изменить дату', ['class'=>'btn btn-success btn-sm'])!!}
                            </div>
                        </div>
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
@stop
