@extends('admin.adminLayout')
@section('title')
    Тег
@stop
@section('js')
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать банер</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Банер
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('partials.errors.basic')
                            {!! Form::open( ['route'=>['admin.banner.store'],
                            'method' => 'POST',
                            'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}
                            @include('admin.banner._form')
                            <!-- PICTURE -->
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input id="upload" type="file" name="upl" multiple />
                                </div>
                            </div>
                            <!-- SUBMIT -->
                            <div class="form-group">
                                {!! Form::submit('Добавить банер', ['class'=>'btn btn-primary']) !!}
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
