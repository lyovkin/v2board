@extends('admin.adminLayout')
@section('title')
    Теги
@stop
@section('js')
    <!-- Tables -->
    <script src="/pub_admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/pub_admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Обьявления</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Обьявления
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.advertisement.create')}}"
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
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Текст</th>
                            <th>Пользователь</th>
                            <th>Фото</th>
                            <th>Цена</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ads as $ad)
                            <tr>
                                <td>{{$ad->id}}</td>
                                <td>{{$ad->title}}</td>
                                <td>{{$ad->category->title}}</td>
                                <td>{{$ad->text}}</td>
                                <td>{{$ad->user->email}}</td>
                                @if($ad->ads_attachment)
                                    <td>
                                        @foreach($ad->ads_attachment as $image)
                                            {!! HTML::image(Image::thumb($image->getSrc(), 80), 'a picture',
                                            ['class' => 'img-thumbnail img-responsive',
                                            'data-toggle'=>"tooltip",
                                            'data-original-title'=>"Коментарий:". $image->comment,
                                            ]) !!}
                                        @endforeach
                                    </td>
                                @else
                                    <td>&nbsp;</td>
                                    @endif
                                            <!-- <td> HTML::image(Image::thumb($ad->attachment->getSrc(), 80), 'a picture', ['class' => 'img-thumbnail img-responsive']) !!}</td> -->
                                    <td>{{$ad->price}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="...">
                                            {!! Form::open(['route'=>['admin.advertisement.destroy',$ad->id],
                                            'class'=>'form-horizontal confirm',
                                            'role'=>'form', 'method' => 'DELETE']) !!}
                                            <a href="{{route('admin.advertisement.show',['id'=>$ad->id])}}"
                                               class="btn btn-primary" data-toggle="tooltip" data-placement="left"
                                               title="Подтвердить"><i class="fa fa-thumbs-o-up"></i></a>
                                            <a href="{{route('admin.advertisement.edit',['id'=>$ad->id])}}"
                                               class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                            <button
                                                    {{-- $ad->advertisements()->count() == 0 ? '' : 'disabled' --}}
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
        <div class="text-center">{!! $ads->render() !!}</div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
