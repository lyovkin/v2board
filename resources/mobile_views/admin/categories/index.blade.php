@extends('admin.adminLayout')
@section('title')
    Категории
@stop
@section('js')
    <!-- Tables -->
    <script src="/pub_admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/pub_admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Категории</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Категории
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.categories.create')}}"
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
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>Алиас</th>
                            <th>Картинка</th>
                            <th>Обьявлений</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{ $category->alias  }}</td>
                                @if($category->attachment)
                                    <td>
                                        <img src="{{ $category->attachment->url }}?w=50&h=50&fit=crop">
                                    </td>
                                @endif

                                <td>{{$category->advertisements()->count()}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.categories.destroy',$category->id],
                                        'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <a href="{{route('admin.categories.edit',['id'=>$category->id])}}"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button
                                                {{$category->advertisements()->count() == 0 ? '' : 'disabled'}}
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
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
