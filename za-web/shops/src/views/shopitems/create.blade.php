@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app')
@section('title')
    Создать товар
@stop

@section('content')
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Создать новый товар</h3>
            </div>
            <div class="panel-body">
                @include('partials.errors.basic')

                @include('shops::shopitems._form')
            </div>
        </div>
    </div>
@stop
