@extends('admin.adminLayout')
@section('title')
    Галлереи
@stop
@section('js')

@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="gallery-header">Галлереи</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Галлереи
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.gallery.create')}}"
                           data-toggle="tooltip"
                           data-original-title="Добавить галлерею"
                           class="btn btn-default btn-mini"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <!--<th>#</th>  -->
                            <th>Заголовок</th>
                            <th>Slug</th>
                            <th>Содержание</th>
                            <th>Мета тег description</th>
                            <th>Мета тег tags</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ $gallery->slug }}</td>
                                    <td><a href="#">Посмотреть</a></td>
                                    <td>{{ mb_substr($gallery->description, 0, 100) . "..." }}</td>
                                    <td>{{ $gallery->tags }}</td>
                                    <td>
                                        <a href="{{route('admin.gallery.edit',['id'=>$gallery->id])}}"
                                            data-toggle="tooltip"
                                            data-original-title="Редактитровать"
                                            class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(['route' => ['admin.gallery.destroy', $gallery->id],
                                        'class' => 'form-horizontal confirm',
                                        'role' => 'form', 'method' => 'DELETE']) !!}
                                            <button data-toggle="tooltip"
                                                data-original-title="Удалить"
                                                type="submit" class="btn btn-danger confirm-btn">
                                                    <i class="fa fa-trash-o"></i>
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="text-center">{!! $galleries->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
