@extends($_SERVER['HTTP_HOST'] == env('HOST') ? 'm_layouts.app' : 'layouts.app2')
@section('title')
    Категории товаров
@endsection

@section('css')

@endsection

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <p class="h4">Категории товаров</p>
    <p class="h5" style="color: red;">* При удалении категории товара, все привязанные к этой категории товары будут так же удалены. Будьте внимательны.</p>
    <table class="table">
        <thead>
        <tr>
            <td><strong>#</strong></td>
            <td><strong>Название категории</strong></td>
            <td class="pull-right"><strong>Редактировать</strong></td>
            <td><strong>Удалить</strong></td>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $index => $cat)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $cat->name }}</td>
            <td><a href="{{ url("items_category/$cat->id/edit") }}" class="btn btn-warning confirm-btn pull-right"><i class="fa fa-refresh"></i> </a></td>
            <td>{!! Form::open(['route'=>['items_category.destroy',$cat->id], 'class'=>'form-horizontal confirm',
                                        'role'=>'form', 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-danger confirm-btn" data-toggle="tooltip" data-original-title="Удалить"><i class="fa fa-trash-o"></i></button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
