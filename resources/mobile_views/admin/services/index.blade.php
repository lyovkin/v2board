@extends('admin.adminLayout')
@section('title')
    Услуги
@stop
@section('js')
    <!-- Tables -->
    <script src="/pub_admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/pub_admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>


@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-hebannerer">Услуги</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все услуги
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.services.create')}}"
                           data-toggle="tooltip"
                           data-original-title="Добавить банер"
                           class="btn btn-default btn-mini"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.panel-hebannering -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <!--<th>#</th>  -->
                            <th>Текст</th>
                            <th>Ссылка</th>
                            <th>Фото</th>
                            <th>Показывать до</th>
                            <th>Город для показа</th>
                            <th>&nbsp;</th>
                            <th data-toggle="tooltip"

                                data-original-title="Выберите банеры">
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($services as $service)
                            <tr>
                                <td class="row-content-td ">{{$service->text}}</td>
                                <td class="row-content-td ">
                                    <a href="{{$service->link}}">{{$service->link}}</a>
                                </td>
                                <td>

                                    @if($service->attachment)

                                        {!! HTML::image(url('img',
                                            ['services', $service->attachment->name]).'?w=50&h=50&fit=crop', 'a picture',
                                            ['class' => 'img-thumbnail img-responsive',
                                            'data-toggle'=>"tooltip",
                                            ]) !!}

                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <!-- <td> HTML::image(Image::thumb($banner->attachment->getSrc(), 80), 'a picture', ['class' => 'img-thumbnail img-responsive']) !!}</td> -->
                                <td>
                                   {{$service->time}}
                                </td>
                                <td>
                                    @if(isset($service->city->city_name))
                                        {{$service->city->city_name}}
                                    @else
                                        {{ 'Город для показа не указан' }}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.services.destroy',$service->id],
                                        'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <a href="{{route('admin.services.edit',['id'=>$service->id])}}"
                                           data-toggle="tooltip"
                                           data-original-title="Редактитровать услугу"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button data-toggle="tooltip"
                                                data-original-title="Удалить услугу"
                                                type="submit" class="btn btn-danger confirm-btn"><i
                                                    class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
                <div class="text-center">{!! $services->render() !!}</div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
