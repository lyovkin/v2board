@extends('m_layouts.app')
@section('title')
    Редактировать объявление
@stop

@section('content')

    <!-- /.row -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Редактировать объявление
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">
                        @include('partials.errors.basic')
                        {!! Form::model($advertisement,['route'=>['ads.update','id' => $advertisement->id],
                        'method' => 'PATCH',
                        'class'=>'form-horizontal', 'role'=>'form']) !!}
                        @include('admin.advertisement._form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@stop
