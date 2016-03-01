@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Редактировать категорию товара
@stop

@section('content')
    <div class="col-md-7">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="h3">Редактировать категорию товара</p>
            </div>
            <div class="panel-body">
                @include('partials.errors.basic')

                @include('items_category._form_edit')
            </div>
        </div>
    </div>
@stop