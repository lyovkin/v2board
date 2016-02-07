@extends('admin.adminLayout')
@section('title')
    Заголовки
@stop
@section('js')
    <!-- Tables -->
    <script src="/pub_admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/pub_admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Заголовки</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все заголовки страниц
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.pagename.create')}}"
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
                            <th>#</th>
                            <th>Путь</th>
                            <th>Название</th>
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pageNames as $page)
                            <tr>
                                <td>
                                    <a href="{{route('admin.page.create',['id'=>$page->id])}}">{{$page->id}}</a>
                                </td>
                                <td>{{$page->path}}</td>
                                <td>{{$page->route}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->description}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">


                                        {!! Form::open(['route'=>['admin.pagename.destroy',$page->id], 'class'=>'form-horizontal',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <a href="{{route('admin.page.create',['id'=>$page->id])}}"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
