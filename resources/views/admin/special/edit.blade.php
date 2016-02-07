@extends('admin.adminLayout')
@section('title')
    Супер предложение
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать Супер предложение</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Супер предложение
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('partials.errors.basic')
                            {!! Form::model($special,['route'=>['admin.special.update','id' => $special->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}
                            @include('admin.special._form')

                            @if ($special->attachment)
                                <div class="form-group" id="thisPic">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        {!! HTML::image(url('img',
                                        ['specials', $special->attachment->name]).'?w=50&h=50&fit=crop', 'a picture',
                                        ['class' => 'img-thumbnail img-responsive', 'data-toggle'=>"tooltip"]) !!}
                                    </div>
                                </div>
                            @endif

                            <div class="form-group" id="newPic">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <input id="upl" type="file" name="upl" />
                                </div>
                            </div>
                            
                            </div>
                            <!-- SUBMIT -->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    {!! Form::submit('Изменить супер предложение', ['class'=>'btn btn-primary'])!!}
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
