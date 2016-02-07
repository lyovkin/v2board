@extends('admin.adminLayout')
@section('title')
    Банер
@stop
@section('js')
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Редактировать банер</h1>
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
                    Банер
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('partials.errors.basic')
                            {!! Form::model($banner,['route'=>['admin.banner.update','id' => $banner->id],
                            'method' => 'PATCH',
                            'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}
                            @include('admin.banner._form')

                            <div class="form-group" id="thisPic">
                                <div class="col-sm-6">
                                    {!! HTML::image(url('img',
                                    ['banners', $banner->attachment->name]).'?w=50&h=50&fit=crop', 'a picture',
                                    ['class' => 'img-thumbnail img-responsive', 'data-toggle'=>"tooltip"]) !!}
                                </div>
                            </div>

                            <div class="form-group" id="newPic">
                                <div class="col-sm-6">
                                    <input id="upload" type="file" name="upl" multiple />
                                </div>
                            </div>
                            
                            </div>
                            <!-- SUBMIT -->
                            <div class="form-group">
                                {!! Form::submit('Изменить банер', ['class'=>'btn btn-primary'])!!}
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
