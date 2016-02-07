@extends('m_layouts.app')

@section('title')
    Создать заявку
@stop

@section('content')
    <!-- /.row -->
    <div class="container">
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Создать заявку
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('partials.errors.basic')
                            {!! Form::open(['route'=>['paidservices.store'],
                            'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('paidservices._form')
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
    </div>
@stop
