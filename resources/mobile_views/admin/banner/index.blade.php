@extends('admin.adminLayout')
@section('title')
    Банер
@stop
@section('js')
    <!-- Tables -->
    <script src="/pub_admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/pub_admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>


@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-hebannerer">Банеры</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Банеры
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.banner.create')}}"
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
                            <th>Оплачено</th>
                            <th>Оплачено до</th>
                            <th>Город для показа</th>
                            <th>&nbsp;</th>
                            <th data-toggle="tooltip"

                                data-original-title="Выберите банеры">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td class="row-content-td ">{{$banner->text}}</td>
                                <td class="row-content-td ">
                                    <a href="{{$banner->link}}">{{$banner->link}}</a>
                                </td>
                                <td>

                                    @if($banner->attachment)

                                        {!! HTML::image(url('img',
                                        ['banners', $banner->attachment->name]).'?w=50&h=50&fit=crop', 'a picture',
                                        ['class' => 'img-thumbnail img-responsive',
                                        'data-toggle'=>"tooltip",
                                        ]) !!}

                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <!-- <td> HTML::image(Image::thumb($banner->attachment->getSrc(), 80), 'a picture', ['class' => 'img-thumbnail img-responsive']) !!}</td> -->
                                <td>
                                    @if($banner->paid)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td>
                                    {{$banner->paid_up}}
                                </td>
                                <td>
                                    {{$banner->city->city_name}}
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.banner.destroy',$banner->id],
                                        'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                                        <a href="{{route('admin.approve.approve',['id'=>$banner->id])}}"
                                           class="btn btn-primary" data-toggle="tooltip" data-placement="left"
                                           title="Подтвердить"><i class="fa fa-thumbs-o-up"></i></a>
                                        <a href="{{route('admin.banner.edit',['id'=>$banner->id])}}"
                                           data-toggle="tooltip"
                                           data-original-title="Редактитровать банер"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button
                                                data-toggle="tooltip"
                                                data-original-title="Удалить банер"
                                                {{-- $banner->bannervertisements()->count() == 0 ? '' : 'disabled' --}}
                                                type="submit" class="btn btn-danger confirm-btn"><i
                                                    class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                                <td><input type="checkbox"/></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-warning">Подтвердить выбранные</button>
                    <button type="button" class="btn btn-danger">Удалить выбранные</button>

                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            Че-то еще
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Dropdown link</a></li>
                            <li><a href="#">Dropdown link</a></li>
                        </ul>
                    </div>
                </div>
                <div class="text-center">{!! $banners->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
