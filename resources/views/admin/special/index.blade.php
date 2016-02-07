@extends('admin.adminLayout')

@section('title')
    Супер предложение
@stop

@section('js')

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-hebannerer">Супер предложения</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Все Супер предложения
                <div class="pull-right">
                    <div class="btn-toolbar  btn-group-xs" role="toolbar" aria-label="...">
                        <a href="{{route('admin.special.create')}}"
                           data-toggle="tooltip"
                           data-original-title="Добавить Супер Предложение"
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
                            <th>Цена</th>
                            <th>Ссылка</th>
                            <th>Картинка</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($specials as $special)
                            <tr>
                                <td class="row-content-td ">{{$special->text}}</td>
                                <td class="row-content-td ">{{$special->price}}</td>
                                <td class="row-content-td ">
                                    <a href="{{$special->link}}">{{$special->link}}</a>
                                </td>
                                <td>
                                    @if($special->attachment)
                                        {!! HTML::image(url('img',
                                            ['specials', $special->attachment->name]).'?w=50&h=50&fit=crop', 'a picture',
                                            ['class' => 'img-thumbnail img-responsive',
                                            'data-toggle'=>"tooltip",
                                            ]) !!}
                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        {!! Form::open(['route'=>['admin.special.destroy',$special->id],
                                        'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}

                                        <a href="{{route('admin.special.edit',['id'=>$special->id])}}"
                                           data-toggle="tooltip"
                                           data-original-title="Редактитровать"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button
                                                data-toggle="tooltip"
                                                data-original-title="Удалить"
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
            <div class="panel-footer">
                <div class="text-center">{!! $specials->render() !!}</div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /.panel -->
    </div>
@stop
