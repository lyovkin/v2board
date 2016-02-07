@extends('admin.adminLayout')
@section('title')
    Банер
@stop
@section('js')
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Банер</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
                            <tr>
                                <!-- <td>{{$banner->id}}</td> -->
                                <td>
                                    <a href="{{route('admin.banner.show',['id'=> $banner->id])}}">
                                        {{$banner->title}}</a></td>
                                <td>
                                    @if($banner->isApproved())
                                        <span class="label label-success">
                                            <i class="fa fa-hand-o-up"></i>
                                        </span>
                                    @else
                                        <span class="label label-warning">
                                            <i class="fa fa-hand-o-down"></i>
                                        </span>
                                    @endif
                                </td>
                                <td>{{$banner->category->title}}</td>
                                <td>{{$banner->text}}</td>
                                <td>{{$banner->user->email}}</td>
                                <td>
                                    @if($banner->attachment)

                                        @foreach($banner->attachment as $image)
                                            {!! HTML::image(Image::thumb($image->getSrc(), 80), 'a picture',
                                            ['class' => 'img-thumbnail img-responsive',
                                            'data-toggle'=>"tooltip",
                                            'data-original-title'=>"Коментарий:". $image->comment,
                                            ]) !!}
                                        @endforeach

                                    @else
                                        &nbsp;
                                    @endif
                                </td>
                                <!-- <td> HTML::image(Image::thumb($advertisement->attachment->getSrc(), 80), 'a picture', ['class' => 'img-thumbnail img-responsive']) !!}</td> -->
                                <td>{{$banner->price}}</td>
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
                                           data-original-title="Редактировать обьявление"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <button
                                                data-toggle="tooltip"
                                                data-original-title="Удалить обьявление"
                                                {{-- $advertisement->advertisements()->count() == 0 ? '' : 'disabled' --}}
                                                type="submit" class="btn btn-danger confirm-btn"><i
                                                    class="fa fa-trash-o"></i></button>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                                <td><input type="checkbox"/></td>
                            </tr>
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
