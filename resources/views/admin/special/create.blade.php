@extends('admin.adminLayout')
@section('title')
    Создать Супер предложение
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать Супер Предложение</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Супер Предложение
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('partials.errors.basic')
                            {!! Form::open( ['route'=>['admin.special.store'],
                            'method' => 'POST',
                            'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}
                            @include('admin.special._form')
                            <!-- PICTURE -->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input id="upl" type="file" name="upl" />
                                </div>
                            </div>

                            <!-- SUBMIT -->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    {!! Form::submit('Добавить Супер Предложение', ['class'=>'btn btn-primary']) !!}
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
