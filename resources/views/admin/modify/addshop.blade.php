@extends('admin.adminLayout')
@section('title')
    Создать магазин
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Создать магазин</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Магазин
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12   ">
                            @include('partials.errors.basic')

                            @include('admin.modify._form_addshop')
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
@endsection