@extends('m_layouts.app')

@section('title')
    Восстановить пароль
@endsection

@section('content')

    <div class="col-sm-7">
        <div class="panel panel-default">
            <div class="panel-heading">Восстановить пароль</div>
            <div class="panel-body">

                @include('partials.errors.basic')

                @if (Session::has('status'))
                    <div class="alert alert-success">
                        {{ Session::get('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="/password/email">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocapitalize="off" value="{{ old('email') }}" required="required">
                            <input type="hidden" name="subject" value="Восстановление пароля">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-envelope"></i> Сброс пароля </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop
